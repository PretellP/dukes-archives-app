<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\{UserStoreRequest, UserUpdateRequest};
use Illuminate\Http\Request;
use App\Models\{Role, User};
use App\Services\UserService;
use Exception;

class UsersController extends Controller
{
    private $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    public function index(Request $request)
    {
        if($request->ajax()){   
            return $this->userService->getDataTable();
        }else{

            $roles = Role::get(['id', 'name']);
            $genders = config('parameters.genders');
            $document_types = config('parameters.document_types');

            return view('admin.users.index', compact(
                'roles',
                'genders',
                'document_types'
            ));
        } 
    }

    public function registerValidate(Request $request, string $column)
    {
        $valid = User::where($column, $request[$column])->first() == null ? "true" : "false";
        return $valid;
    }

    public function store(UserStoreRequest $request)
    {
        $storage = env('FILESYSTEM_DRIVER');

        try {
            $this->userService->store($request, $storage);
            $success = true;
            $message = config('parameters.stored_message');
        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }

        return response()->json([
            "success" => $success,
            "message" => $message
        ]);
    }  
    
    public function editValidate(Request $request, string $column)
    {
        $id = $request['id'];
        $user = User::where($column, $request[$column])->first();

        return $user == null || $user->id == $id ? 'true' : 'false';
    }

    public function edit(User $user)
    {
        return response()->json([
            "user" => $user
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $storage = env('FILESYSTEM_DRIVER');

        try {
            $success = $this->userService->update($request, $user, $storage);
            $message = config('parameters.updated_message');
        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }

        return response()->json([
            "success" => $success,
            "message" => $message
        ]);
    }

    public function destroy(User $user)
    {
        try {
            $success = $this->userService->destroy($user);
            $message = config('parameters.deleted_message');
        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
        ]);
    }
}
