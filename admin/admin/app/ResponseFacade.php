<?php
/**
 * Created by PhpStorm.
 * User: MDATA
 * Date: 9/25/2017
 * Time: 11:44 AM
 */

namespace App;


class ResponseFacade
{
    static function validationMessage($msg, $status = '1')
    {
        echo json_encode( array('encounters'=>$msg, 'status'=>$status), JSON_PRETTY_PRINT );
        exit();
    }
}