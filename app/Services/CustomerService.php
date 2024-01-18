<?php

namespace App\Services;

use App\Models\{User};
use Auth;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerService
{
    public function getDataTable()
    {
        $query = User::with('role')
                    ->whereHas('role', function ($q) {
                        $q->where('name', 'CLIENTE');
                    })
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
            ->editColumn('role.name', function ($user) {
                return $user->role == null ? '-' : $user->role->name;
            })
            ->rawColumns(['name', 'status'])
            ->make(true);

        return $allUsers;
    }
}
