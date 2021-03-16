<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Parish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class ParishController extends Controller
{   
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        // fetching the parish list from datbase in ascending order
        $parish = Parish::orderBy('parish_name','asc')->get();
        return view('backend.parish.index', compact('parish')); 
    }

    public function create() 
    {
        return view('backend.parish.create');
    }
    
    public function store(Request $request)
    {   //validation
        $validateParishData = $request->validate([
            'parish_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|unique:parish|max:20',
            'parish_zone' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|max:20'
        ]);
        //insert data
            Parish::insert([
            'parish_name' => $request->parish_name,
            'zone' => $request->parish_zone
            ]);
            //Toster notification message
            $notification = array(
                'message' => 'Parish data  added Successfully',
                'alert-type' => 'success'
            );

            Alert::success('Success !', 'New Record added succesfully');
            //redirecting to Parish List page
            return Redirect()->back();
            
            
    }

    public function edit($id)
    {   //getting parish table by id
        $parish_data = Parish::find($id);

        return view('backend.parish.edit', compact('parish_data'));
    }
    
    public function update(Request $request, $id)
    {
         //validation
         $validateParishData = $request->validate([
            'parish_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|unique:parish|max:20',
            'parish_zone' => 'required|string|max:20'
        ]);
        //Update data
            Parish::find($id)->update([
            'parish_name' => $request->parish_name,
            'zone' => $request->parish_zone   
            ]);

        Alert::success('Success !', 'Record Updated succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.parish.index');
    }

    public function destroy($id)
    {   //deleting row by specific id
        Parish::find($id)->delete();
        //Toster notification message
        Alert::success('Success !', 'Record Deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.parish.index');

    }
}
