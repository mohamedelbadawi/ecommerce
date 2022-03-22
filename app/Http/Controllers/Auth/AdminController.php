<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::with('roles')->paginate(10);
        return view('admin.admin.index', compact('admins'));
    }


    public function create()
    {
        $roles = Role::all();

        return view('admin.admin.create', compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        try {
            $admin = Admin::create($request->validated());
            $admin->assignRole($request['role_id']);
            Alert::success('Done', 'Admin created successfully');


        } catch (ModelNotFoundException $exception) {

            Alert::error('ERROR', 'Can\'t create admin now');
        }
        return redirect()->route('admin.index');
    }

    public function edit(Admin $admin)
    {
        $roles = Role::all();
        return view('admin.admin.edit', compact('roles', 'admin'));
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        try {
            $admin->update($request->validated());
            $admin->syncRoles($request['role_id']);
            Alert::success('Done', 'Admin updated successfully');
        } catch (QueryException $exception) {
            Alert::error('ERROR', 'Can\'t create admin now');
        }
        return redirect()->route('admin.index');
    }

    public function destroy(Admin $admin)
    {

        try {
            $admin->delete();
            Alert::success('Done', 'Admin deleted successfully');
        } catch (ModelNotFoundException $exception) {

            Alert::error('error', 'Admin deleted successfully');
        }

        return redirect()->route('admin.index');
    }
}
