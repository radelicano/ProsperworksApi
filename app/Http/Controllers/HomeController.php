<?php

namespace App\Http\Controllers;

use App\Logs;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function ajaxUrl(request $request)
    {
//        $date = $request->input('date');
//        $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
//        $logs = DB::table('table_logs')
//        ->join('employees', 'table_logs.emp_id', '=', 'employees.emp_id')
//        ->select('table_logs.*', 'employees.name', 'employees.email')
//        ->where('date_logged','LIKE',"%$date%")
//        ->get();

        $date = $request->input('date');
        $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
        $data['logs'] = Logs::with('employees')->where('date_logged','LIKE',"%$date%")->get();
        return view('home-table',$data);

    }

    public function arrayUrl(request $request)
    {
        
        $arrayInput = $request->input('check');

        $finalarray = array();

        if(!empty($arrayInput)){
        foreach($arrayInput as $value){
            $array = $value;

 

            $array_explode = explode("|", $array);
            
      

            $keys = array('id','name','email','hours','date_logged');

            $a = array_combine($keys, $array_explode);

     
        
            $finalarray[] = $a;
            
        }
        }else{
            return redirect()->route('home');
        }

    
            
        if(!empty($finalarray)){
  
        $datetime = new DateTime();
        

                
        $activitydate= $datetime->getTimestamp(); 

        foreach ($finalarray as $value) {
          
  

        $emp_name = $value['name'];
        $emp_email = $value['email'];
        $emp_hours = $value['hours'];
        $date_logged = $value['date_logged'];
        $emp_id = $value['id'];




        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.prosperworks.com/developer_api/v1/activities");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
            \"type\":{
            \"category\": \"user\",\"id\": \"0\"},
            \"parent\": { 
            \"type\": \"person\", 
            \"id\": \"$emp_id\"
           }, 
           \"details\": \"$emp_name has logged for $emp_hours hours on $date_logged\", 
           \"user_id\": \"125229\", 
           \"activity_date\": \"$activitydate\"}");
          
        curl_setopt($ch, CURLOPT_POST, 1); // POST DATA
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $headers = array (
            'Content-Type: application/json',
            'X-PW-AccessToken:c4f2a428f87fd45a48afba7253e1827d',
            'X-PW-Application:developer_api',
            'X-PW-UserEmail:pudgewars511@yahoo.com.ph'
            );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        echo $result;
        if (curl_errno($ch)){
            echo 'Error:' . curl_error($ch);
            
        }
        curl_close ($ch);

     }

    
        }else{
        echo "Please check the boxes";

        }
        return redirect()->route('home');
            }

          

  }
