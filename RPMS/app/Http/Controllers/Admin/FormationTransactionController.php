<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormationTransaction;
use App\Models\User;
use App\Models\Backend\Formation_stage;
use App\Models\Backend\Community;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class FormationTransactionController extends Controller
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
        $formationStages = Formation_stage::first();
        $users = User::orderBy('first_name','asc')->get();
        
        return view('admin.formationTransaction.index', compact([
            'formationStages',
            'users'
        ]));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formationStages = Formation_stage::all();
        $users = User::all();
        $communities = Community::all();
        
        return view('admin.formationTransaction.create', compact(['formationStages', 'users', 'communities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(
            [
                'user_id' => 'required',
                'formation_stage_id' => 'required',
                'concerned_authority' => 'nullable|string|min:2|max:50',
                'community_id' => 'nullable',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date',

            ],
        );
        //insert data
        FormationTransaction::insert([
            'user_id' => $request->user_id,
            'formation_stage_id' =>  $request->formation_stage_id,
            'concerned_authority' => $request->concerned_authority,
            'community_id' => $request->community_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
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

        if (!$user) 
        {
            Alert::warning('Sorry !', 'No records found with this id !');
            return redirect()->route('admin.formationTransaction.index');
        }

        $formationStages = Formation_stage::all();
        $communities = $user->community;
        // dd($communities);
        return view('admin.formationTransaction.show', compact(['user', 'communities', 'formationStages']));
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
