<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\District;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DistrictController extends Controller
{
        //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       $district =  District:: orderBy('district_name','asc')->get();

       return view('backend.district.index', compact('district')); 
    }

   
    public function create() 
    {
        return view('backend.district.create');
    }

    public function store(Request $request)
    {   //validation
        $district_Data = $request->validate([
            'district_name' => 'required|string'
        ]);
        //insert data
            District::insert([
                'district_name' => $request->district_name
            ]);
            Alert::success('Success !', 'New Record added succesfully');
            //redirecting
            return Redirect()->back();
                
    }

    
    public function edit($id)
    {   //getting data from  table by id
        $district_data = District::find($id);
        return view('backend.district.edit', compact('district_data'));
    }


    
    public function update(Request $request, $id)
    {
         //validation
         $district_data = $request->validate([
            'district_name' => 'required|string|min:2|max:50|'
        ]);
        //insert data     
            District::find($id)->update([
                'district_name' => $request->district_name
            ]);
        Alert::success('Success !', 'Record Updated succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.district.index');
    }

    public function destroy($id)
    {   //deleting row by specific id
        District::find($id)->delete();
        Alert::success('Success !', 'Record Deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.district.index');

    }

}
