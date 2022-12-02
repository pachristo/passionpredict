<?php

/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 9/14/2018
 * Time: 7:09 PM
 */

namespace App\Helpers;

class ImageValidator
{
    static function validator($file, $id=null)
    {
        $extension = $file->getClientOriginalExtension();
        $fileSupport = ['jpg', 'jpeg', 'png', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF'];
        if(in_array($extension, $fileSupport))
        {
            return $filename = currentUser()->id.$id.'.'.$extension;
        }
        else{
            JSONResponder::validationMessage('Image/File Type Not Supported');
        }
    }
}