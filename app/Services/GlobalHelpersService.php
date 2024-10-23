<?php

namespace App\Services;

class GlobalHelpersService
{

    /*
     * $img_file = $request->file(filename)
     * $img_ext = file extension we want in file name e.g,'webp','png'
     * $name_parameter = any type of slug string that we want to mix inside file name to make it unique e.g, category-name
     */
    public static function processImageName($img_file, $img_ext, $name_parameter = null): String
    {
        $filename=pathinfo($img_file->getClientOriginalName(), PATHINFO_FILENAME);
        $filename=str_replace(" ","-",$filename);
//        $fileExtension=$img_file->getClientOriginalExtension();
        if($name_parameter!=null){
            return $filename."-".$name_parameter."-".time().'.'.$img_ext;
        }
        return $filename.time().'.'.$img_ext;
    }

}
