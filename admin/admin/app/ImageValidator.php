<?php
/**
 * Created by PhpStorm.
 * User: MDATA
 * Date: 9/25/2017
 * Time: 11:37 AM
 */

namespace App;


class ImageValidator
{
    static function validator($file, $id, $slug = null)
    {
        $extension = $file->getClientOriginalExtension();
        $fileSupport = ['jpg', 'jpeg', 'png', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF'];
        if(in_array($extension, $fileSupport))
        {
            if ($slug) {
                $code = $slug;
            } else {
                $code = rand(11111,99999);
            }
            return $filename = $id.$code.'.'.$extension;
        }
        else{
            ResponseFacade::validationMessage('Image Type Not Supported');
        }
    }
}