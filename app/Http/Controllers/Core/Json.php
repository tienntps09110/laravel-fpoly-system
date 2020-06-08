<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Json extends Controller
{
    public static function get($data, $status = '200', $message = ''){
        $notification = [];
        for($i = 0; $i < count($data); $i++){
            if(isset($data[$i]['key']) && isset($data[$i]['data'])){
                $notification[$data[$i]['key']] = $data[$i]['data'];
            }
        }   
        return Json::resJson($notification, $status, $message);
    }
    public static function getOne($data, $status = '200', $message = ''){
        return Json::resJson($data, $status, $message); 
    }
    protected static function resJson($notification, $status, $message){
        
        return response()->json(
            [
                "Notification"=>$notification,
                "Message"=>$message,
                "Status"=>$status
            ]);
    }
    public static function getMess($message = '', $status = '200'){
        
        return response()->json(
            [
                "Message"=>$message,
                "Status"=>$status
            ]);
    }
}
