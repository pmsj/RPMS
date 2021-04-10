<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Backend\Community;
use App\Models\Backend\Designation;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $designations = Designation::first();
        $users = $designations->users;
    
        return view('admin.appointment.index', compact([
            'users',
        ]));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $communities = Community::all();
        $designations = Designation::all();

        return view('admin.appointment.create', compact(['users', 'communities', 'designations']));
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'user_id' => 'required',
                'ministry' => 'nullable',
                'designation_id' => 'required',
                'institution_parish_office' => 'required|string|max:191',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date',
                'comment' => 'nullable|max:191',
                'community_id' => 'required'

            ],
        );
        //insert data
        Appointment::insert([
            'user_id' => $request->user_id,
            'ministry' =>  $request->ministry,
            'designation_id' => $request->designation_id,
            'institution_parish_office' => $request->institution_parish_office,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'comment' => $request->comment,
            'community_id' => $request->community_id,
        ]);

        Alert::success('Success !', 'New Record added succesfully');
        //redirecting
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        //check if user exists
        if (!$user) {
            Alert::warning('Sorry !', 'No records found with this id !');
            return redirect()->route('admin.appointment.index');
        }

        // $communitiy = Community::OrderBy('community_name', 'asc')->paginate(10);

        $communities = $user->communities;
        return view('admin.appointment.show', compact(['user', 'communities']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
