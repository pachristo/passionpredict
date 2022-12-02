<?php
/**
 * Created by PhpStorm.
 * User: OLADEJI BUSARI
 * Date: 8/10/2018
 * Time: 3:27 PM
 */

namespace App;


class EmailValidator
{
    static function validator($email)
    {
        $mail = explode('@', $email);
        $extension = ['gmail.com', 'yahoo.com', 'hotmail.com', 'yahoo.co.uk', 'protonmail.com', 'ymail.com', 'live.com', 'betloaded.com', 'betking.com'];
        if(in_array(strtolower($mail[1]), $extension)) return true;
        return false;
//            ResponseFacade::validationMessage('PLEASE CHECK THE EMAIL YOU TYPED!');

    }
}