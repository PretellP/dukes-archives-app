<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Role, User};
use App\Services\UserService;
use Auth;
use Exception;

class ProfileController extends Controller
{
    private $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }
    public function index()
    {
        $roles = Role::get(['id', 'name']);
        $genders = config('parameters.genders');
        $document_types = config('parameters.document_types');

        return view('home.profile.index', compact(
            'roles',
            'genders',
            'document_types'
        ));
       
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect()->route('home.profile.index')->with('flash_message', 'Updated!');

    }
}
