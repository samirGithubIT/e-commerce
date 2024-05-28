<?php 

use Illuminate\Support\Facades\Storage;

// function test(){
//     return 'this is running';
// }


function fileUpdate($databaseFile, $file, $destination){

    $fileName = '';

    if($file){
        $fileName = fileUpload ($file, $destination);
       fileDelete($databaseFile);
    }elseif(!$file && $databaseFile){
        $fileName = $databaseFile;
    }

    return $fileName;
}

function fileUpload($file, $destination){

    $fileName = '';

    if(!$file){
        return '';
    }

    if(in_array($file->getClientOriginalExtension(),['php','asp','jsp','py','rb','cs','java','c','cpp','js'])){
        $extension = 'bad';
    }else{
        $extension = $file->getClientOriginalExtension();
    }

    $fileName = md5($file->getClientOriginalExtension(). time()) . "." . $extension;

    try{

        $fileName = $destination . $fileName;
        $fileName = Storage::disk('public')->putFileAs($file , $fileName);
        return $fileName;

    }catch(Exception $e){
        return '';
    }

}

function fileDelete(){

    foreach (func_get_args() as $filePath){

        if($filePath && Storage::disk('public')->exists($filePath)){
            Storage::disk('public')->delete($filePath);
        }

    }

}

function GetPaymentStatus($payment_status){

    $status = [
        'Pending' => '<span class="bg-danger badge">Pending</span>',
        'paid' => '<span class="bg-success badge">Paid</span>'
    ];

    return $status[$payment_status];

} 
function GetPaymentOptions(){

    $status = [
        'Pending',
        'paid'
    ];

    return $status;

} 
function GetDeliveryStatus($Delivery_status){

    $status = [
        'Pending' => '<span class="bg-warning badge">Pending</span>',
        'processing' => '<span class="bg-info badge">Processing</span>',
        'Delivered' => '<span class="bg-success badge">Delivered</span>',
        'Cancelled' => '<span class="bg-danger badge">Cancelled</span>'
    ];

    return $status[$Delivery_status];

} 
function GetDeliveryOptions(){

    $status = [
        'Pending',
        'processing',
        'Delivered',
        'Cancelled'
    ];

    return $status;

} 