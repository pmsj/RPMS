<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;
use App\Models\EventTransaction;
use App\Models\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchUserController extends Controller

{
    public function index()
    {
        return view('admin.report.searchUserByYear.index');
    }

    public function searchUserByYear(Request $req)
    {

        $req->validate(
            [
                'query' => 'required',

            ],
            [
                'query.required' => "Please enter a year / first name / sur name to search"
            ]);
    
        $query = User::where('entry_date_sj', 'like', '%'.$req->input('query').'%')
                    ->orWhere('first_name', 'like', '%'.$req->input('query').'%')
                    ->orWhere('sur_name', 'like', '%'.$req->input('query').'%')
                    ->orWhere('email', 'like', '%'.$req->input('query').'%')->paginate(10);

        $year = $req->input('query');
        return view('admin.report.searchUserByYear.reportByYear', ['users' => $query, 'year' => $year]);


    }

    public function currentYearAdmissions(Request $req)
    {
         $currentYearAdmissions =  User::where('entry_date_sj', 'like', '%'.Carbon::now()->year.'%')->paginate(10);
                         
                   
        return view('admin.report.admission.currentYearAdmission', compact('currentYearAdmissions'));     
    }    

    public function currentYearDeacons(Request $req)
    {
        
        $event = Event::first();
        $users = $event->users()->where('event_id', '1')
                          ->where('held_on','like', '%'.Carbon::now()->year.'%')
                          ->get();

                        //  dd($currentYearDeacons);
        return view('admin.report.deacon.currentYearDeacons', compact('users'));     

    }    

    public function currentYearDepartedUsers(Request $req)
    {
    
        $currentYearDepartedUsers = User::onlyTrashed()
            ->where('deleted_at', 'like', '%'.Carbon::now()->year.'%')
            ->paginate(10);
        return view('admin.report.departure.currentYearDepartedUsers', compact('currentYearDepartedUsers'));     

    }    
}
