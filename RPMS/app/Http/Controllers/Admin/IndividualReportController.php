<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Community;
use App\Models\FormationTransaction;
use App\Models\User;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class IndividualReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('first_name', 'asc')->get();
       
        return view('admin.report.individualReport.index', compact('users'));
    }

    public function individaulReport(Request $req)
    {
         $req->validate(
            [
                'user_id' => 'required',

            ],
            [
                'user_id.required' => "Please select a name"
            ]);
      
          $formationStages = FormationTransaction::select('formation_transactions.start_date', 'formation_transactions.end_date', 'formation_transactions.concerned_authority', 'formation_stages.stage_name','community.community_name')
                                                    ->join('formation_stages', 'formation_stages.id', '=', 'formation_transactions.formation_stage_id')
                                                    ->join('community', 'community.id', '=', 'formation_transactions.community_id')
                                                    // ->join('users', 'users.id', '=', 'formation_transactions.user_id')
                                                    ->where('user_id', '=', $req->input('user_id'))
                                                    ->get();
                
        $search = $req->input('user_id');
        // dd($search);
        return view('admin.report.individualReport.individualReport', compact('formationStages','search'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       
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
