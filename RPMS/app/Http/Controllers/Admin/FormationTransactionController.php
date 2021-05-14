<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormationTransaction;
use App\Models\User;
use App\Models\Backend\Formation_stage;
use App\Models\Backend\Community;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class FormationTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $formationStage = Formation_stage::first();
        $users = $formationStage->users()->paginate(10);
        return view('admin.formationTransaction.index', compact([
            'users',
            'formationStage'
        ]));

    }

    
    public function create()
    {
        $formationStages = Formation_stage::orderBy('id', 'asc')->get() ;
        $users = User::orderBy('first_name', 'asc')->get();
        $communities = Community::orderBy('community_name', 'asc')->get();
        
        return view('admin.formationTransaction.create', compact(['formationStages', 'users', 'communities']));
    }


    public function store(Request $request)
    {
         $request->validate(
            [
                'user_id' => 'required',
                'formation_stage_id' => 'required',
                'concerned_authority' => 'nullable|string|min:2|max:50',
                'community_id' => 'required',
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

    
    public function show($id)
    {
       
        $user = User::find($id);

        //check if user exists
        if (!$user) 
        {
            Alert::warning('Sorry !', 'No records found with this id !');
            return redirect()->route('admin.formationTransaction.index');
        }

        $communitiy = Community::OrderBy('community_name', 'asc')->paginate(10);

        $communities = $user->communities;
        return view('admin.formationTransaction.show', compact(['user', 'communities', 'communitiy']));

    }

    public function edit($id)
    {
        $formationStages = Formation_stage::all();
        $users = User::all();
        $communities = Community::all();

        return view('admin.formationTransaction.create', compact(['formationStages', 'users', 'communities']));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
