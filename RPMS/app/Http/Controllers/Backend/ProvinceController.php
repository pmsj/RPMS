<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Province;
use App\Http\Controllers\Controller;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProvinceController extends Controller
{
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $province = Province::orderBy('province_name','asc')->get();
       return view('backend.province.index', compact('province')); 
    }

    public function create() 
    {
        return view('backend.province.create');
    }

    
    public function store(Request $request)
    {   //validation
        $province_data = $request->validate([
            'province_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|unique:province|min:1|max:50',
            'province_abbreviation' => 'required|unique:province|alpha|min:1|max:10'
        ],
        [
            'regex' => 'only characters and single space are allowed'
        ]
        
        );
        //insert data
            Province::insert([
                'province_name' => $request->province_name,
                'province_abbreviation' => $request->province_abbreviation  
            ]);
            //Toster notification message
            $notification = array(
                'message' => 'Province Data  added Successfully',
                'alert-type' => 'success'
            );

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
        $province_data = Province::find($id);
        return view('backend.province.edit', compact('province_data'));
    }

    public function update(Request $request, $id)
    {
         //validation
         $province_data = $request->validate([
            'province_name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|unique:province|min:1|max:50',
            'province_abbreviation' => 'required|unique:province|alpha|min:1|max:10'
        ],
        [
            'regex' => 'only characters and single space are allowed'
        ]
        
        );
        //insert data
            Province::find($id)->update([
                'province_name' => $request->province_name,
                'province_abbreviation' => $request->province_abbreviation 
            ]);
            //Toster notification message
            $notification = array(
                'message' => 'Province data Updated Successfully',
                'alert-type' => 'success'
            );
        Alert::success('Success !', 'Record updated succesfully');
            //redirecting to Parish List page
            return Redirect()->route('admin.province.index');
    }

    public function destroy($id)
    {   //deleting row by specific id
        Province::find($id)->delete();
        //Toster notification message
        $notification = array(
            'message' => 'Province data Deleted Successfully',
            'alert-type' => 'success'
        );
        Alert::success('Success !', 'Record deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.province.index');

    }
}
