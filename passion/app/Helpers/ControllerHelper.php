<?php

namespace App\Helpers;

use App\COVID\Modules\Log\Model\Log;
use App\COVID\Modules\State\Model\State;

class Helper
{
    public static function upload_picture($picture, $folder=null, $id=null)
    {
        $file_name = time().rand(11111,99999);
        $file_name .= rand();
        $file_name = sha1($file_name);
        if ($picture) {
            $ext = $picture->getClientOriginalExtension();
            $picture->move("images/uploads/$folder/$id/", $file_name . "." . $ext);
            $local_url = $file_name . "." . $ext;

            $s3_url = "uploads/$folder/$id/".$local_url;

            return $s3_url;
        }
        return "";
    }

    public static function sanitizeInput($posts_data, $exempted=[], $default_filter=FILTER_SANITIZE_STRING)
    {
        if (!is_array($posts_data))
            $posts_data = [$posts_data];
        $args = array();
        $within_db_field_limit = array();
        foreach ($posts_data as $prk=>$prv) {
            if (is_array($prv)) {
                $args[$prk] = array(
                    'filter' => $default_filter,
                    'flags' => FILTER_REQUIRE_ARRAY,
                );

            } else {
                if (!in_array($prk, array_keys($args))) {
                    if (is_array($exempted) && in_array($prk, $exempted))
                        $args[$prk] = '';
                    else
                        $args[$prk] = FILTER_SANITIZE_STRING;
                }
            }
        }
        $post_request_data = filter_var_array($posts_data, $args);
        if ($within_db_field_limit) {
            foreach ($within_db_field_limit as $key=>$end) {
                $val = $post_request_data[$key];
                $post_request_data[$key] = substr($val, 0, $end);
            }
        }
        return $post_request_data;
        //return array_map('utf8_encode', $post_request_data);
    }

    public static function clean($string)
    {
        $string = utf8_encode($string);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }


    public static function postCurl($url, $method='POST', $data=array())
    {
        $postVariables = $referer = '';
        foreach($data as $key=>$value) {
            $postVariables .= $key.'='.$value.'&';
        }
        rtrim($postVariables, '&');
        $ch = @curl_init();
        $cpost = false;
        if (strtoupper($method) == 'POST')
            $cpost = true;
        @curl_setopt($ch, CURLOPT_POST, $cpost);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();

        $headers[] = 'Content-Type: application/json';

        @curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, $postVariables);
        @curl_setopt($ch, CURLOPT_URL, $url);
        @curl_setopt($ch, CURLOPT_REFERER, $referer);

        $webpage = curl_exec($ch);
        @curl_close($ch);
        return $webpage;
    }

}