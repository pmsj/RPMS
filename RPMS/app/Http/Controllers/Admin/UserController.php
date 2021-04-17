<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
// use Mockery\Generator\StringManipulation\Pass\Pass;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(10,['*'], 'users');
        $RecycleBin = User::onlyTrashed()->latest()->paginate(10, ['*'], 'RecycleBin');
        return view('admin.users.index',compact('users', 'RecycleBin'));
    }


    public function create()
    {
        return view('admin.users.create', ['roles' => ROle::all()]);
    }


    public function store(Request $request)
    {

        // Using fortify for validation
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['first_name', 'middle_name', 'sur_name', 'email', 'password', 'password_confirmation', 'birth_date', 'entry_date_sj', 'mobile_number1', 'mobile_number2']));

        $user->roles()->sync($request->roles);

        // enable password reset link Here
        Password::sendResetLink($request->only(['email']));

        Alert::success('Success !', 'New User Created Successfully.');

        return redirect(route('admin.users.index'));
    }


    public function show($id)
    {
      
    }

    //method departed() to show how many died or discontinued
    public function departed()
    {
        $users = User::all();
        $RecycleBin = User::onlyTrashed()->latest()->paginate(5);
        return view('admin.report.departure.index',compact('RecycleBin', 'users'));
    } 


    public function edit($id)
    {

        $user = User::find($id);

        if (!$user) {
            Alert::error('Sorry !', 'You cannot edit this user');

            return redirect(route('admin.users.index'));
        }

        $roles = Role::all();
        return view('admin.users.edit', compact(['user', 'roles']));
    }


    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id); //protects application// if the user is not found it shows// 404 | NOT FOUND
        $user = User::find($id);
        if (!$user) {
            Alert::error('Sorry !', 'You cannot edit this user');

            return redirect(route('admin.users.index'));
        }
       
        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        Alert::success('Success !', 'Record Updated Successfully');

        return redirect(route('admin.users.index'));
    }

    //Soft Delete

    public function softDelete($id)
    {
        User::find($id)->delete();
        Alert::success('Success !', ' User has been moved to Trash');
        return redirect(route('admin.users.index'));
    }

    //restore User
    public function restore($id)
    {
        //finddin the data with id and restoring
        User::withTrashed()->find($id)->restore();
        Alert::success('Success !', ' User restored Successfully');
        return redirect(route('admin.users.index'));
    }


    public function destroy($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();

        Alert::success('Success !', ' User Deleted Successfully');
        return redirect(route('admin.users.index'));
    }
}
