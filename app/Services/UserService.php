<?php

namespace App\Services;

use App\Models\{User};
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserService
{
    public function getDataTable()
    {
        $query = User::with('role')
            ->withCount('orders')
            ->select('users.*');

        $allUsers = DataTables::of($query)
            ->editColumn('name', function ($user) {
                return ' <a class="view_user_btn" href="javascript:void(0);" 
                            data-toggle="modal" data-target="#viewUserModal"
                            data-url="'. route('admin.users.show', $user) .'">' .
                    $user->full_name
                    . '</a>';
            })
            ->editColumn('gender', function ($user) {
                return $user->gender_name;
            })
            ->editColumn('birthdate', function ($user) {
                return $user->birth_only_date;
            })
            ->editColumn('document_type', function ($user) {
                return $user->document_type_name;
            })
            ->editColumn('status', function ($user) {
                return getStatusButton($user->status);
            })
            ->editColumn('role_id', function ($user) {
                return $user->role == null ? '-' : $user->role->name;
            })
            ->addColumn('action', function ($user) {
                $btn = '<button data-toggle="modal" data-id="' .
                    $user->id . '" data-url="' . route('admin.users.update', $user) . '" 
                                data-send="' . route('admin.users.edit', $user) . '"
                                data-original-title="edit" class="me-3 edit btn btn-warning btn-sm
                                editUser"><i class="fa-solid fa-pen-to-square"></i></button>';
                if (
                    $user->orders_count == 0 &&
                    $user->id != Auth::user()->id
                ) {
                    $btn .= '<a href="javascript:void(0)" data-id="' .
                        $user->id . '" data-original-title="delete"
                                    data-url="' . route('admin.users.destroy', $user) . '" class="ms-3 edit btn btn-danger btn-sm
                                    deleteUser"><i class="fa-solid fa-trash-can"></i></a>';
                }

                return $btn;
            })
            ->rawColumns(['name', 'status', 'action'])
            ->make(true);

        return $allUsers;
    }

    public function store(Request $request, $storage = null)
    {
        $data = normalizeInputStatus($request->validated());
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            return $user;
        }

        throw new Exception(config('parameters.exception_message'));
    }

    public function update(Request $request, User $user, $storage)
    {
        $data = normalizeInputStatus($request->validated());
        $data['password'] = $data['password'] == NULL ? $user->password : Hash::make($data['password']);
        $data['status'] = $user->id == Auth::user()->id ? 1 : $data['status'];
        $data['role_id'] = $user->id == Auth::user()->id ? $user->role_id : $data['role_id'];

        if ($user->update($data)) {
            return true;
        }

        throw new Exception(config('parameters.exception_message'));
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return true;
        }

        throw new Exception(config('parameters.exception_message'));
    }

    public function generatePassword()
    {
        return Str::random(8);
    }
}
