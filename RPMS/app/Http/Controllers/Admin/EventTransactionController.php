<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event;
use App\Models\User;
use App\Models\EventTransaction;
use App\Models\Backend\Community;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $event = Event::first();
        // dd($event);
        $users = $event->users;
        return view('admin.eventTransaction.index', compact([
            'users',
        ]));
    }

    public function create()
    {
        $events = Event::all();
        $users = User::all();
        $communities = Community::all();

        return view('admin.eventTransaction.create', compact(['events', 'users', 'communities']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'event_id' => 'required',
                'held_on' => 'required|date',
                'presided_over_by' => 'nullable|string|min:2|max:50',
                'community_id' => 'nullable',
                'place' => 'nullable|string|max:50',
            ]
        );
        //insert data
        EventTransaction::insert([
            'user_id' => $request->user_id,
            'event_id' =>  $request->event_id,
            'held_on' => $request->held_on,
            'presided_over_by' => $request->presided_over_by,
            'community_id' => $request->community_id,
            'place' => $request->place
        ]);

        Alert::success('Success !', 'New Record added succesfully');
        //redirecting
        return Redirect()->back();
    }

    public function show($id)
    {

        $user = User::find($id);

        //check if user exists
        if (!$user) {
            Alert::warning('Sorry !', 'No records found with this id !');
            return redirect()->route('admin.eventTransaction.index');
        }

        $communitiy = Community::OrderBy('community_name', 'asc')->paginate(10);

        // $communities = $user->communityEvents;
        return view('admin.eventTransaction.show', compact(['user']));
    }


}
