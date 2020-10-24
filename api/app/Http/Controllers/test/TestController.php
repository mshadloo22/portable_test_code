<?php

namespace tutuorfinder\Http\Controllers\test;

use App\Helper\Time_helper;
use Illuminate\Http\Request;
use tutuorfinder\Http\Controllers\Controller;

class TestController extends Controller
{
    // [category] functionname ==>explain
    private $pages;

    public function __construct()
{
    $this->pages['timediff']=array('timediff'=>'timediff | check if timediff date works as expected',
        'test2'=>'just test2');


    $this->middleware('auth');
    $html='<h1><a href="'.url('/').'/Test" >Home</a></h1>';
    echo $html;

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $html='<ul>';
        foreach($this->pages as $kTitle=>$vArray){
            $html.='<h2 style="border:lightblue 0.1em solid; background-color: lightgray;">'.$kTitle.'</h2>';
            foreach($vArray as $k=>$v) {
                $html .= '<li><a href="' . url('/') . '/Test/' . $k . ' " >' . $v . '</a></li>';
            }
        }
        $html.='</ul>';
        echo $html;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $action
     * @return \Illuminate\Http\Response
     */
    public function show($action)
    {
        switch($action){
            case 'timediff':
                $this->_timediff();
                break;

        }

        //
    }

    public function _timediff(){
        echo 'time test<br>';
        //tt=new App\Helper\Time_helper();
        $tt=new Time_helper('');
        $tt1='2016-12-18 12:22:33';
        $tt2='2090-09-25 14:23:34';

        $t1=new Time_helper($tt1,1);
        $t2=new Time_helper($tt2,1);

        $html="";
        $html.="<h2>Time 1</h2>";
        $html.=$t1;
        $html.="<p>diff</p>";
        $html.=$t1->diffDay .'<br>';

        $html.="<h2>Time 2</h2>";
        $html.=$t2;
        $html.="<p>diff 22</p>";
        $html.=$t2->diffYear.'<br>';

        $datetime1 = date_create($tt1);
        $datetime2 = date_create($tt2);
        $interval = date_diff($datetime1, $datetime2);
        $html.=$interval->format('%R%a days');

        $d1=new \DateTime($tt1);
        $d2=new \DateTime($tt2);
        $diff=$d2->diff($d1);
        print_r( $diff ) ;

        echo $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \tutuorfinder\xy_subject_node  $xy_subject_node
     * @return \Illuminate\Http\Response
     */
    public function edit(xy_subject_node $xy_subject_node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \tutuorfinder\xy_subject_node  $xy_subject_node
     * @return \Illuminate\Http\Response
     */
    public function destroy(xy_subject_node $xy_subject_node)
    {
        //we used subject/{id} as it works same(all of them xy_subject_node)
    }


    public function t01(){
        echo 'hiii';
    }
}
