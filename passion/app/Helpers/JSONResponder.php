<?php

/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 9/14/2018
 * Time: 7:08 PM
 */

namespace App\Helpers;

class JSONResponder
{
    static function validationMessage($msg, $status = '1')
    {
        echo json_encode( array('post'=>$msg, 'status'=>$status), JSON_PRETTY_PRINT );
        exit();
    }
}