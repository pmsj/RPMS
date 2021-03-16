<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Ministry;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class MinistryController extends Controller
{

    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $ministry =  Ministry::orderBy('ministry_name','asc')->get();
      return view('backend.ministry.index', compact('ministry')); 
    }

    public function create() 
    {
        return view('backend.ministry.create');
    }

    public function store(Request $request)
    {   //validation
        $ministry_data = $request->validate([
            'ministry_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|unique:ministry|min:1|max:50',
        ]);
        //insert data
            Ministry::insert([
            'ministry_name' => $request->ministry_name
            ]);
            Alert::success('Success !', 'New Record added succesfully');
           //redirecting
            return Redirect()->back();
                
            
    }
   
    public function show($id)
    {
       
    }

    
    public function edit($id)
    {   //getting Ministry table by id
        $ministry_data = Ministry::find($id);
        return view('backend.ministry.edit', compact('ministry_data'));
    }

    
    public function update(Request $request, $id)
    {
         //validation
         $ministry_data = $request->validate([
            'ministry_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|unique:ministry|min:1|max:25',
        ]);
        //insert data
            Ministry::find($id)->update([
            'ministry_name' => $request->ministry_name
            ]);
            Alert::success('Success !', 'Record Updated succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.ministry.index');
    }

    
    public function destroy($id)
    {   //deleting row by specific id
        Ministry::find($id)->delete();

        Alert::success('Success !', 'Record Deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.ministry.index');

    }
}
