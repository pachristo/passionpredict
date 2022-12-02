<?php

function curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);
    curl_close($ch);
    return $return;
}

function img($img, $path = null)
{
    if ($img == "") {
        return asset('images/avatar.png');
    } else {
        return asset('images/' . $path . $img);
    }

}
function onlyNumbers($string)
{

    if (preg_replace('/[^0-9]/', '', trim($string)) != '') {
        return preg_replace('/[^0-9]/', '', $string);
    }
    return 0;
}
