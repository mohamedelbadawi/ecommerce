<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use RealRashid\SweetAlert\Facades\Alert;
use function redirect;
use function view;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {

        $users = User::orderBy('created_at', 'ASC')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.user.create');
    }


    public function destroy(User $user)
    {
        try {
            $user->delete();
            Alert::success('Done', 'User deleted successfully');
        } catch (QueryException $exception) {
            Alert::error('Error', 'Can\'t delete user right now');
        }
        return redirect()->route('admin.user.index');
    }


}
