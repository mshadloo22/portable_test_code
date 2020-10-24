<?php

namespace tutuorfinder\Http\Controllers;

use App\Helper\Email_helper;
use App\Helper\Time_helper;
use App\Helper\Time_helper2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $_userRole;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    private function _init(){
        $this->_userRole=Auth::user()->role;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homeindex');

    }



    public function home()
    {
        $this->_init();
        $myView=null;
        switch(strtolower($this->_userRole)){
            case 'admin':
            case 'atemp-admin':
                $myView=view('atemp-admin.homeAdmin');
                break;
            case 'student':
            case 'atemp-student':
                $myView=view('atemp-student.homeStudent');
                break;
            case 'author':
            case 'atemp-author':
            case 'tutor':
            case 'atemp-tutor':
                $myView=view('atemp-author.homeAuthor',['_userRole'=>$this->_userRole]);
                break;
        }
        return $myView;
    }
}
