<?php

namespace App\Http\Controllers\Backend;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchUserController extends Controller

{
    public function index()
    {
        return view('admin.report.searchUserByYear.index');
    }
    public function searchUserByYear(Request $req)
    {

        $req->validate(
            [
                'query' => 'required',

            ],
            [
                'query.required' => "Please enter a year to search"
            ]
        );
    // dd($req);
     $query = User::where('entry_date_sj', 'like', '%'.$req->input('query').'%')->paginate(20);

    $year = $req->input('query');
    // dd($year);
        // return $year;
        return view('admin.report.searchUserByYear.reportByYear', ['users' => $query, 'year' => $year]);


    }
}
