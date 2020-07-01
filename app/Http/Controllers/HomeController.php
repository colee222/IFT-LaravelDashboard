<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * The fucns below link the the web.php file
     */
    public function index()
    {
        return view('home');
    }
    
    public function aboutindex()
    {
        return view('about');
    }
    
    public function statsINLINEindex()
    {
        return view('statsINLINE');
    }
    
    public function statsOUTSIDEindex()
    {
        return view('statsOUTSIDE');
    }
    
    public function trafficFlowindex()
    {
        return view('trafficFlow');
    }
    
    public function TFAnimationindex()
    {
        return view('TFAnimation');
    }
}
