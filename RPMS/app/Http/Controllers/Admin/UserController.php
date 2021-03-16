<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(10)]);
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
        // Password::sendResetLink($request->only(['email']));

        Alert::success('Success !', 'New User Created Successfully.');

        return redirect(route('admin.users.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view(
            'admin.users.edit',
            [
                'roles' => Role::all(),
                'user' => User::find($id)
            ]
        );
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


    public function destroy($id)
    {
        User::destroy($id);

        Alert::success('Success !', ' User Deleted Successfully');
        return redirect(route('admin.users.index'));
    }
}
