<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Community;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Country;
use App\Models\Backend\District;
use App\Models\Backend\State;
use RealRashid\SweetAlert\Facades\Alert;


class CommunityController extends Controller
{
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       //displaying community data in by name in ascending order
        $communities = Community::OrderBy('community_name', 'asc')->paginate(10);

        return view('backend.community.index', compact('communities'));
    }


    public function create()
    {
        return view('backend.community.create', [
            'communities' => community::all(),
            'countries' => Country::all(),
            'districts' => District::all(),
            'states' => State::all()
        ]);
        return view('backend.community.create');
    }


    public function store(Request $request)
    {   //validation
        $community_Data = $request->validate(
            [
                'community_name' => 'required|string|unique:community|min:2|max:25',
                'mobile_number_community' => 'required|string|max:15',
                'mobile_number_authority' => 'nullable|string|max:15',
                'pincode' => 'required|string|max:15',
                'village_town_colony' => 'required|string|max:50',
                'block_subDivision' => 'required|string|max:50',
                'district_id' => 'nullable',
                'state_id' => 'nullable',
                'country_id' => 'nullable',
                'addressline' => 'required|string|max:255',

            ],
            [
                'community_name.alpha_dash' => 'The community name may only contain letters, numbers, dashes and underscores without any space'
            ]
        );
        //insert data
        Community::insert([
            'community_name' => $request->community_name,
            'mobile_number_community' => $request->mobile_number_community,
            'mobile_number_authority' => $request->mobile_number_authority,
            'pincode' =>  $request->pincode,
            'village_town_colony' => $request->village_town_colony,
            'block_subDivision' => $request->block_subDivision,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'country_id' => $request->country_id,
            'addressline' => $request->addressline,
        ]);
        // sweet alert message
        Alert::success('Success !', 'Record added succesfully');
        //redirecting to Parish List page
        return Redirect()->back();
    }


    public function show($id)
    { //nothing added yet
        //
    }


    public function edit($id)
    {
        //getting  table data by id
        // $community_data = Community::find($id);

        //passing the id to view using compact method
        // return view('backend.community.edit', compact('community_data'));

        $data['communities'] = Community::find($id);

        if (!Community::find($id)) {
            Alert::warning('Sorry !', 'No record found with this id !');
            return redirect()->route('user.personalDetail.index');
        }

        $data['districts'] = District::all();
        $data['states'] = State::all();
        $data['countries'] = Country::all();
        return view('backend.community.edit', $data);
    }


    public function update(Request $request, $id)
    {
        //validation
        $community = $request->validate(
            [
                'community_name' => 'required|string|unique:community|min:2|max:25',
                'mobile_number_community' => 'required|string|max:15',
                'mobile_number_authority' => 'nullable|string|max:15',
                'pincode' => 'required',
                'village_town_colony' => 'required|string|max:50',
                'block_subDivision' => 'required|string|max:50',
                'district_id' => 'nullable',
                'state_id' => 'nullable',
                'country_id' => 'nullable',
                'addressline' => 'required|string|max:255',

            ],
            [
                'community_name.alpha_dash' => 'The community name may only contain letters, numbers, dashes and underscores without any space'
            ]
        );
        //Update data
        $update = Community::find($id)->update(
            [
                'community_name' => $request->community_name,
                'mobile_number_community' => $request->mobile_number_community,
                'mobile_number_authority' => $request->mobile_number_authority,
                'pincode' =>  $request->pincode,
                'village_town_colony' => $request->village_town_colony,
                'block_subDivision' => $request->block_subDivision,
                'district_id' => $request->district_id,
                'state_id' => $request->state_id,
                'country_id' => $request->country_id,
                'addressline' => $request->addressline
            ],
            [
                'community_name.regx:' => 'only alphabet[a-z,A-Z] is allowed'
            ]
        );


        //Toster notification message
        $notification = array(
            'message' => 'Community data Updated Successfully',
            'alert-type' => 'success'
        );
        Alert::success('Success !', 'Record Updated succesfully');
        //redirecting to Parish List page
        //redirecting to Parish List page
        return Redirect()->route('admin.community.index');
    }



    public function destroy($id)
    {   //deleting row by specific id   
        Community::find($id)->delete();
        //Toster notification message
        $notification = array(
            'message' => 'Community data Deleted Successfully',
            'alert-type' => 'success'
        );
        Alert::success('Success !', 'Record Deleted succesfully');
       
        return Redirect()->route('admin.community.index');
    }
}
