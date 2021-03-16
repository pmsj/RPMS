<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{   
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
       //displaying Country data in by name in ascending order
       $country = Country::OrderBy('country_name', 'asc')->get();
        
       return view('backend.country.index', compact('country'));

    }

   
    public function create() 
    {
        return view('backend.country.create');
    }

    
    public function store(Request $request)
    {   //validation
        $country_Data = $request->validate([
            'country_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|unique:country|min:1|max:50',
            'country_abbreviation' => 'nullable|unique:country|string|max:5'
        ]);
        //insert data
        Country::insert([
            'country_name' => $request->country_name,
            'country_abbreviation' => $request->country_abbreviation
            ]);
            //Toster notification message
            $notification = array(
                'message' => 'Country Data  added Successfully',
                'alert-type' => 'success'
            );

            Alert::success('Success !', 'Country added succesfully');
            //redirecting
            return Redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {   //getting country table by id
        $country_data = Country::find($id);
        return view('backend.country.edit', compact('country_data'));
    }

   
    public function update(Request $request, $id)
    {
         //validation
         $country_data = $request->validate([
            'country_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|string|unique:country|min:1|max:50',
            'country_abbreviation' => 'nullable|unique:country|string|max:5'
        ]);

            //Update Country data by matching specific id
            Country::find($id)->update([
                'country_name'=> $request->country_name,
                'country_abbreviation' => $request->country_abbreviation
            ]);
            //Toster notification message
            $notification = array(
                'message' => 'Country data Updated Successfully',
                'alert-type' => 'success'
            );

        Alert::success('Success !', 'Record updated succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.country.index')->with($notification);
    }

    public function destroy($id)
    {   
        //deleting row by specific id
        Country::find($id)->delete();

        //Toster notification message
        $notification = array(
            'message' => 'Country data Deleted Successfully',
            'alert-type' => 'success'
        );
        Alert::success('Success !', 'Record deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.country.index')->with($notification);

    }
}
