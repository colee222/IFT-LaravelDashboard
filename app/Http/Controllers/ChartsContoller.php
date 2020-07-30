<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts; //I believes this references the routes. Not using DB right now so shouldn't matter.

class ChartsContoller extends Controller
{
    
       public function __construct() //This checks if a user is logged in
    {
        $this->middleware('auth');
    }

        public function index()
    {
            
    /**
     * Pass a key variable to the [name] view
     * using the compact method as
     * the second parameter.
    */ 
        //$key = Charts::whereNotNull('chartvalue')->pluck('chartvalue');
          $key = 'lineChartAvgDLDataRate';

        return view('home', compact('key')); //compact is used to pass variables.
    }
    
    public function post(Request $request)
    {
                
        /*Charts::whereNotNull('id')->delete();
        
        $Charts = new Charts();
        $Charts->chartvalue = $request->chartvalue;
        $Charts->name = $request->chartvalue;
        
        $Charts->save();*/
        
        
        
        
        
        return response()->json(["randomValue"=>$request->value1,
                                 "randomValue2"=>$request->value2,
                                 "randomValue3"=>$request->value3,
 ]); //This was for the first try
    }  
    
    public function selection(Request $request)
    {
        
        return response()->json(["success"=>$request->chartvalue]); //This was for the first try
    } 
}
