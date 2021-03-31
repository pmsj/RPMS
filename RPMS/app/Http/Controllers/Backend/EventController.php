<?php

namespace App\Http\Controllers\Backend;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class EventController extends Controller
{
    //Initializing constructor //to redired a used to landing page if a use is not logged in // (Redirection defined in - Http/Middleware/Authenticate.php )
    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function index()
    {

        $events = Event::orderBy('id', 'asc')->get();
        return view('backend.event.index', compact('events')); 
    }


    public function create()
    {
        return view('backend.event.create');
    }

    
    public function store(Request $request)
    {

        //validation
        $events = $request->validate(
            [
                'event_name' => 'required|string|min:1|max:50',
                'event_description' => 'required|string|max:200',
            ],
            [
                'regex' => 'only characters and single space are allowed'
            ]

        );
        //insert data
        Event::insert([
            'event_name' => $request->event_name,
            'event_description' =>  $request->event_description,
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
    {
        //getting  table by id
        $events = Event::find($id);
        return view('backend.event.edit', compact('events'));   
    }

    
    public function update(Request $request, $id)
    {

        //validation
        $events = $request->validate(
            [
                'event_name' => 'required|string|min:1|max:50',
                'event_description' => 'required|string|max:200',
            ],
            [
                'regex' => 'only characters and single space are allowed'
            ]

        );
        //insert data
        Event::find($id)->update([
            'event_name' => $request->event_name,
            'event_description' =>  $request->event_description,
        ]);

        Alert::success('Success !', 'New Record Updated  succesfully');
        //redirecting
        return Redirect()->back();
    }

  
    public function destroy($id)
    {
        //deleting row by specific id
        Event::find($id)->delete();
        Alert::success('Success !', 'Record Deleted succesfully');
        //redirecting to Parish List page
        return Redirect()->route('admin.event.index');
    }
}
