<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabelRequest;
use App\Models\Label;
use App\Services\LabelService;
use Exception;
use Illuminate\Http\Request;

class LabelsController extends Controller
{
    private $labelService;

    public function __construct(LabelService $service)
    {
        $this->labelService = $service;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->labelService->getDataTable();
        } 

        return view('admin.labels.index');
    }

    public function store(LabelRequest $request)
    {
        try {
            $this->labelService->store($request);
            $success = true;
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'stored');

        return response()->json([
            "success" => $success,
            "message" => $message
        ]);
    }

    public function show(Label $label)
    {
        $label['status'] = getStatusButton($label->status);

        return response()->json([
            "label" => $label
        ]);
    }

    public function edit(Label $label)
    {
        return response()->json([
            "label" => $label,
        ]);
    }

    public function update(LabelRequest $request, Label $label)
    {
        try {
            $success = $this->labelService->update($request, $label);
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'updated');

        return response()->json([
            "success" => $success,
            "message" => $message
        ]);
    }

    public function destroy(Label $label)
    {
        try {
            $success = $this->labelService->destroy($label);
        } catch (Exception $e) {
            $success = false;
        }

        $message = getMessageFromSuccess($success, 'deleted');

        return response()->json([
            "success" => $success,
            "message" => $message,
        ]);
    }
}
