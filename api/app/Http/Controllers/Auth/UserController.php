<?php

namespace tutuorfinder\Http\Controllers\Auth;

use tutuorfinder\User;
use tutuorfinder\Models\xy_user_subject;
use Illuminate\Http\Request;
use tutuorfinder\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user=User::where('users.id',$user_id)->first()->toArray();
        //leftJoin('tu_user_subjects as s','users.id','=','s.user_id')
        $user['lst_subjects']=xy_user_subject::where('user_id',$user_id)->leftJoin('view_subjects','tu_user_subjects.subject_id','=',
            'view_subjects.id')->get()->toArray();
        return response()->json($user);



    }

    public function selectSubject(Request $request,$user_id){
        echo 'sssss all select subject';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \tutuorfinder\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \tutuorfinder\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \tutuorfinder\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
