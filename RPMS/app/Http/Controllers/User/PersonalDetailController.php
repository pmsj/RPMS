<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\PersonalDetail;
use App\Models\Backend\country;
use App\Models\Backend\District;
use App\Models\Backend\State;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $personalDetails = $user->personalDetail;
        return view('user.personalDetail.index', compact('personalDetails'));

    }

    public function create()
    {
        $user_id = auth()->user()->id;
        // $personalDetails = PersonalDetail::pluck('user_id')->first();
        // if()
        // {
        //     Alert::warning("Alert","You've already added your Personal Details !");
        //     return redirect()->route('user.personalDetail.index');
        // }
        $user = User::find($user_id);

            $personalDetails = $user->personalDetail;
            $countries =  Country::select('id', 'country_name')->get();
            $districts =  District::select('id', 'district_name')->get();
            $states = State::select('id', 'state_name')->get();

            return view('user.personalDetail.create', compact(['personalDetails', 'countries', 'districts', 'states']));
    
    }

    public function store(Request $request)
    {    
        $this->validate($request, [
            'father' => 'required|string|min:2|max:255',
            'mother' => 'required|string|min:2|max:255',
            'siblings' => 'required|string|min:2|max:255',
            'village_town_colony' => 'required|String|min:2|max:255',
            'parish' => 'required|string|min:2|max:255',
            'dioses' => 'required|string|min:2|max:255',
            'district_id' => 'nullable',
            'pincode' => 'required|string|max:20',
            'post_office' => 'required|string|min:2|max:255',
            'post_box_number' => 'nullable|string|max:255',
            'state_id' => 'nullable',
            'country_id' => 'nullable'
        ]);

        PersonalDetail::insert([
            'user_id'=> auth()->user()->id,
            'father' => $request->father,
            'mother' => $request->mother,
            'siblings' => $request->siblings,
            'village_town_colony' => $request->village_town_colony,
            'parish' => $request->parish,
            'dioses' => $request->dioses,
            'district_id' => $request->district_id,
            'pincode' => $request->pincode,
            'post_office' => $request->post_office,
            'post_box_number' => $request->post_box_number,
            'state_id' => $request->state_id,
            'country_id' => $request->country_id
        ]);
        Alert::success('Success !', 'Personal Details added succesfully');
        return Redirect()->route('user.personalDetail.index');
    
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $personalDetails = $user->personalDetail;
        
        //check weather the detail exist with given id
        if(!PersonalDetail::find($id)){
            Alert::warning('Sorry !', 'No record found with this id !');
            return redirect()->route('user.personalDetail.index');
        }

        // check authorised user for editing personal details 
        if (Auth::user()->id !== $personalDetails->user_id)
          {
                Alert::warning('Sorry !','You cannot edit this Record');
                return redirect()->route('user.personalDetail.index');
          }
          
        $countries =  Country::select('id', 'country_name')->get();
        $districts =  District::select('id', 'district_name')->get();
        $states = State::select('id', 'state_name')->get();

        return view('user.personalDetail.edit', compact(['personalDetails', 'countries', 'districts', 'states']));

    }
    
     public function update(Request $request, $id)
     {
         
        $this->validate($request, [
            'father' => 'required|string|min:2|max:255',
            'mother' => 'required|string|min:2|max:255',
            'siblings' => 'required|string|min:2|max:255',
            'village_town_colony' => 'required|String|min:2|max:255',
            'parish' => 'required|string|min:2|max:255',
            'dioses' => 'required|string|min:2|max:255',
            'district_id' => 'nullable',
            'pincode' => 'required|string|max:20',
            'post_office' => 'required|string|min:2|max:255',
            'post_box_number' => 'nullable|string|max:255',
            'state_id' => 'nullable',
            'country_id' => 'nullable'
        ]);

        //update record
        PersonalDetail::find($id)->update([
            'user_id' => auth()->user()->id,
            'father' => $request->father,
            'mother' => $request->mother,
            'siblings' => $request->siblings,
            'village_town_colony' => $request->village_town_colony,
            'parish' => $request->parish,
            'dioses' => $request->dioses,
            'district_id' => $request->district_id,
            'pincode' => $request->pincode,
            'post_office' => $request->post_office,
            'post_box_number' => $request->post_box_number,
            'state_id' => $request->state_id,
            'country_id' => $request->country_id
        ]);
        Alert::success('Success !', 'Record Updated succesfully');
        return Redirect()->route('user.personalDetail.index');
     }

     //delete record
    //  public function destroy($id)
    //  {
    //      PersonalDetail::find($id)->delete();
    //     Alert::success('Success !', ' Personal Details Deleted Successfully');
    //      return redirect()->route('user.personalDetail.index');
    //  }
}
