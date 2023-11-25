<?php

namespace App\Services;

use App\Models\{Label};
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LabelService
{
    public function getDataTable()
    {
        $query = Label::withCount('products')
                ->select('labels.*');

        $allLabels = DataTables::of($query)
            ->editColumn('name', function ($label) {
                return ' <a class="view_label_btn" href="javascript:void(0);" 
                            data-url="'. route('admin.labels.show', $label) .'">' .
                    $label->name
                    . '</a>';
            })
            ->editColumn('status', function ($label) {
                return getStatusButton($label->status);
            })
            ->editColumn('created_at', function ($label) {
                return $label->created_at;
            })
            ->editColumn('updated_at', function ($label) {
                return $label->updated_at;
            })
            ->addColumn('action', function ($label) {
                $btn = '<button data-toggle="modal" data-id="' .
                    $label->id . '" data-url="'. route('admin.labels.update', $label) .'" 
                                data-send="'. route('admin.labels.edit', $label) .'"
                                data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                                editLabel"><i class="fa-solid fa-pen-to-square"></i></button>';
                if (
                    $label->products_count == 0
                ) {
                    $btn .= '<a href="javascript:void(0)" data-id="' .
                        $label->id . '" data-original-title="delete"
                                    data-url="'. route('admin.labels.destroy', $label) .'" class="ms-3 edit btn btn-danger btn-sm
                                    deleteLabel"><i class="fa-solid fa-trash-can"></i></a>';
                }

                return $btn;
            })
            ->rawColumns(['name', 'status', 'action'])
            ->make(true);

        return $allLabels;
    }

    public function store($request) 
    {
        $data = normalizeInputStatus($request->validated());

        if ($label = Label::create($data)) {
            return $label;
        }

        throw new Exception(config('parameters.exception_message'));
    }

    public function update($request, Label $label)
    {
        $data = normalizeInputStatus($request->validated());

        if ($label->update($data)) {
            return true;
        }

        throw new Exception(config('parameters.exception_message'));
    }

    public function destroy(Label $label)
    {
        if ($label->delete()) {
            return true;
        }

        throw new Exception(config('parameters.exception_message'));
    }
}