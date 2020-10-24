<?php

namespace tutuorfinder\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TutorSearchController extends Controller
{
    public function index() {
        $users = DB::select("SELECT * FROM `users` WHERE ROLE = 'tutor'");
        return view('tutorsearch', ['users' => $users]);
    }

    public function getAddresses (Request $request) {
        $selectedAddress = $request['selectedAddress'];
        $tutors = DB::select('SELECT * FROM `users` WHERE role="tutor" AND address!="'.$selectedAddress.'" ');
        return response()->json($tutors, 200);
    }
}
