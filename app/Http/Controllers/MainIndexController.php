<?php

namespace App\Http\Controllers;

use App\Logs;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainIndexController extends Controller
{
    public function index(request $request)
    {
        $data['logs'] = Logs::with('employees')->get();
//        $logs = Logs::find(1)->employees->get();
//        $date = $request->input('date');
//        $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
//        $logs = DB::table('table_logs')
//            ->join('employees', 'table_logs.emp_id', '=', 'employees.emp_id')
//            ->select('table_logs.*', 'employees.name', 'employees.email')
//            ->where('date_logged','LIKE',"%$date%")
//            ->get();
//        ->get(array('name','email'))

        #$json = json_decode($logs);
        #dd($json);
        return view('main.index',$data);

//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, "https://api.prosperworks.com/developer_api/v1/activities/search");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "{}");
//        curl_setopt($ch, CURLOPT_POST, 1); // POST DATA
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        $headers = array (
//            'Content-Type: application/json',
//            'X-PW-AccessToken:c4f2a428f87fd45a48afba7253e1827d',
//            'X-PW-Application:developer_api',
//            'X-PW-UserEmail:pudgewars511@yahoo.com.ph'
//        );
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//
//        $json = curl_exec($ch);
//
//
//
//        $AllNotes = json_decode($json);
//
//
//        if (curl_errno($ch)) {
//            echo 'Error:' . curl_error($ch);
//        }
//        curl_close ($ch);
//
//
//
//        return view('main.index',['AllNotes' => $AllNotes]);
    }
}
