<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class InstitutionController extends Controller
{
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
       $institution = Institution::orderBy('institution_name','asc')->get();
       return view('backend.institution.index', compact('institution')); 
    }

    public function create() 
    {
        return view('backend.institution.create');
    }

    public function store(Request $request)
    {   //validation
        $institution_data = $request->validate([
            'institution_name' => 'required|regex:/^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/|string|min:1|max:50',
            'institution_place' => 'required|regex:/^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/|string|min:1|max:25',
            'institution_established_date' => 'required'
            
        ]);
        //insert data
            Institution::insert([
                'institution_name' => $request->institution_name,
                'institution_place' => $request->institution_place,
                'institution_established_date' => $request->institution_established_date
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
        $institution_data = Institution::find($id);
        return view('backend.institution.edit', compact('institution_data'));
    }


    public function update(Request $request, $id)
    {
         //validation
            $institution_data = $request->validate([
            'institution_name' => 'required|regex:/^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/|string|min:1|max:50',
            'institution_place' => 'required|regex:/^[a-zA-Z\u0080-\u024F\s\/\-\)\(\`\.\"\']+$/|string|min:1|max:25',
            'institution_established_date' => 'required'
        ]);
        //insert data
            Institution::find($id)->update([
            'institution_name' => $request->institution_name,
            'institution_place'=> $request->institution_place,
            'institution_established_date' => $request->institution_established_date
            ]);

        Alert::success('Success !', 'Record Updated succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.institution.index');
    }

  
     
    public function destroy($id)
    {   //deleting row by specific id
        Institution::find($id)->delete();
        Alert::success('Success !', 'Record Deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.institution.index');

    }
}
