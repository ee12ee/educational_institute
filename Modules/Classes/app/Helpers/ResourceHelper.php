<?php
function resource($request){

    if($file=$request->file('file_path')){
            $file_name=md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name=$file_name.'.'.$ext;
            $file_path='resoueces/';
            $file->move($file_path,$file_full_name);
           
    }
    return $file_path.$file_full_name;
}
