<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\Formation_stage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FormationStageController extends Controller
{
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function index()
    {
        $formation_stage = Formation_stage::orderBy('stage_name','asc')->get();
       return view('backend.formation_stage.index', compact('formation_stage')); 
    }

    public function create() 
    {
        return view('backend.formation_stage.create');
    }

    
    public function store(Request $request)
    {   //validation
        $formation_stage_data = $request->validate([
            'stage_name' => 'required|string|min:1|max:50',
            'stage_description' => 'required|string|max:200',
            'stage_duration' => 'required|string'
        ],
        [
            'regex' => 'only characters and single space are allowed'
        ]
        
        );
        //insert data
            Formation_stage::insert([
                'stage_name' => $request->stage_name,
                'stage_description' =>  $request->stage_description,
                'stage_duration' => $request->stage_duration
            ]);

            Alert::success('Success !', 'New Record added succesfully');
            //redirecting
            return Redirect()->back();
    }

    
    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {   //getting  table by id
        $formation_stage_data = Formation_stage::find($id);
        return view('backend.formation_stage.edit', compact('formation_stage_data'));
    }

    public function update(Request $request, $id)
    {
         //validation
         $formation_stage_data = $request->validate([
            'stage_name' =>'required|string|min:1|max:50',
            'stage_description' => 'required|max:200',
            'stage_duration' => 'required|string'
        ],
        [
            'regex' => 'only characters and single space are allowed'
        ]
        
        );
        //update data
            Formation_stage::find($id)->update([
                'stage_name' => $request->stage_name,
                'stage_description' => $request->stage_description,
                'stage_duration' => $request->stage_duration 
            ]);
        
            //Toster notification message
            $notification = array(
                'message' => 'Formation stage data Updated Successfully',
                'alert-type' => 'success'
            );
        Alert::success('Success !', 'Record Updated succesfully');
            //redirecting to Parish List page
            return Redirect()->back()   ;
    }

    public function destroy($id)
    {   //deleting row by specific id
        Formation_stage::find($id)->delete();
        Alert::success('Success !', 'Record Deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.formationStage.index');

    }


}
