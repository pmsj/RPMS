<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DesignationController extends Controller
{
   //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
   public function __construct()
   {
       $this->middleware('auth');
   }
   
   public function index()
   {
       $designation = Designation::orderBy('id','asc')->paginate(10);
   

      return view('backend.designation.index', compact('designation')); 
   }

   public function create() 
   {
       return view('backend.designation.create');
   }


   public function store(Request $request)
   {   //validation || only character and space are allowed via regex pattern
       $designation_Data = $request->validate([
           'designation_name' => 'required|unique:designations|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:1|max:50',
           'designation_abbreviation' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|unique:designations|string|min:1|max:7'
       ],
       [
           'regex' => 'Only characters and single space are allowed'
       ]
       );
       //insert data
           Designation::insert([
               'designation_name' => $request->designation_name,
               'designation_abbreviation' => $request->designation_abbreviation
           ]);

            Alert::success('Success !', 'New Record added succesfully');
            //redirecting
            return Redirect()->back();
            
   }

   public function show($id)
   {
       //
   }

   public function edit($id)
   {   //getting parish table by id
       $designation_data = Designation::find($id);
       //returning view
       return view('backend.designation.edit', compact('designation_data'));
   }

   public function update(Request $request, $id)
   {
        //validation
        $designation_data = $request->validate([
           'designation_name' => 'required|unique:designations|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:1|max:50',
           'designation_abbreviation' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|unique:designations|string|min:1|max:7'
       ]);
       //Update data
           Designation::find($id)->update([
           'designation_name' => $request->designation_name,
           'designation_abbreviation' => $request->designation_abbreviation
           ]);
        Alert::success('Success !', 'Record Updated succesfully');
           //redirecting to Parish List page
           return Redirect()->route('admin.designation.index');
   }

   public function destroy($id)
   {   //deleting row by specific id
       designation::find($id)->delete();

        Alert::success('Success !', 'Record Deleted succesfully');
       //redirecting to Parish List page
       return Redirect()->route('admin.designation.index');

   } 
}
