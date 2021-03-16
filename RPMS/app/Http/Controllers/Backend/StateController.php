<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\State;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class StateController extends Controller
{   
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $state = State::orderBy('state_name','asc')->get();
    

       return view('backend.state.index', compact('state')); 
    }

    public function create() 
    {
        return view('backend.state.create');
    }


    public function store(Request $request)
    {   //validation || only character and space are allowed via regex pattern
        $state_Data = $request->validate([
            'state_name' => 'required|unique:state|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:1|max:20',
        ],
        [
            'regex' => 'Only characters and single space are allowed'
        ]
        );
        //insert data
            State::insert([
                'state_name' => $request->state_name
            ]);
            //Toster notification message
            $notification = array(
                'message' => 'State Data  added Successfully',
                'alert-type' => 'success'
            );
        Alert::success('Success !', 'New Record added succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.state.create');
            
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   //getting parish table by id
        $state_data = State::find($id);
        //returning view
        return view('backend.state.edit', compact('state_data'));
    }

    public function update(Request $request, $id)
    {
         //validation
         $state_data = $request->validate([
            'state_name' => 'required|unique:state|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:1|max:30',
        ]);
        //insert data
            State::find($id)->update([
            'state_name' => $request->state_name
            ]);

             Alert::success('Success !', 'Record Updated succesfully');
            //redirecting
            return Redirect()->back();
    }

    public function destroy($id)
    {   //deleting row by specific id
        State::find($id)->delete();
        //Toster notification message
        $notification = array(
            'message' => 'State data Deleted Successfully',
            'alert-type' => 'success'
        );
        Alert::success('Success !', 'Record deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.state.index')->with($notification);

    }
}
