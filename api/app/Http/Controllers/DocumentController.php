<?php

namespace tutuorfinder\Http\Controllers;

use App\Helper\Email_helper;
use App\Helper\Time_helper;
use App\Helper\Time_helper2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{

    private $_userRole;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');

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

    /**
     * hit end point directly
     */
    public function searchDocument(Request $request, Closure $next){

        header("Access-Control-Allow-Origin: *");
        //ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Methods' => 'POST,GET,OPTIONS,PUT,DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
        ];

            //The client-side application can set only headers allowed in Access-Control-Allow-Headers




        $q=$request->getQueryString('q');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://content.guardianapis.com/search?q=".$q,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "api-key: ada6430e-f7c3-453d-83a3-6d803c03e34f",
                "Cookie: AWSELB=75B9BD811C5C032EDEF76366759629DCCB8726D7A3A39AE79176BA6AB368948A26D9768FE2E4519DDF3CD336789F71716B110728D848C1D04B65BB84D24443B5AF9D6B52AE; AWSELBCORS=75B9BD811C5C032EDEF76366759629DCCB8726D7A3A39AE79176BA6AB368948A26D9768FE2E4519DDF3CD336789F71716B110728D848C1D04B65BB84D24443B5AF9D6B52AE"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return response()->json('OK',200,$headers);
        echo $response;
    }

    public function test1(){

        return response()->json(['name'=>'yesss','actioncall'=>'successsfulll']);
    }



}
