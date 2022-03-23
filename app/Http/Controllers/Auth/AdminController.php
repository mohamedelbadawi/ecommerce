<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\updateAccountRequest;
use App\Models\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function editAccountSettings()
    {
        return view('admin.account.account_settings');
    }

    public function updateAccountSettings(updateAccountRequest $request)
    {
        $currentPassword = auth('admin')->user()->password;

        if ((Hash::check($request->oldpassword, $currentPassword))) {
            if (!Hash::check($request->newpassword, $currentPassword)) {
                $user = Admin::find(Auth::user()->id);
//                dd($user);
                $user->password = bcrypt($request->newpassword);
                Admin::where('id', Auth::user()->id)->update(array('password' => $user->password));
                Alert::success('Done', 'password updated successfully');
            } else {
                Alert::error('Error', 'old password can\'t be a new password');
                return redirect()->route('admin.edit_settings');
            }
        }
        return redirect()->route('admin.dashboard');
    }
}
