<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;



class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.roles.index', ['roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
    
        $role = $request->validate(
            [
                'role_name' => 'required|unique:roles|string|max:20'
            ]   
        );

        Role::create($role);


            //Toster notification message
            $notification = array(
                'message' => 'New Role created Successfully',
                'alert-type' => 'success'
            );
            //redirecting to Parish List page
            return Redirect()->route('admin.roles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.roles.edit',
        ['roles' => Role::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if(!$role)
        {
                $notification = array(
                'message' => 'You cannot edit this User',
                'alert-type' => 'error'
            );

            return redirect(route('admin.roles.index'))->with($notification);
        }

        $validateData = $request->validate([
            'role_name' => 'required|unique:roles|string|max:20'
        ]);
        //updating values
            Role::find($id)->update([
                'role_name' => $request->role_name
            ]);
        
            //Toster notification message
            $notification = array(
                'message' => 'Role Updated Successfully',
                'alert-type' => 'success'
            );
            //redirecting to Parish List page
            return Redirect()->route('admin.roles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        
        $notification = array(
            'message' => ' Role Deleted Successfully',
            'alert-type' => 'success'
        );
        //redirecting to Parish List page
        return Redirect()->route('admin.roles.index')->with($notification);
    }
}
