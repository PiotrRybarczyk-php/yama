<?php
defined('BASEPATH') or exit('No direct script access allowed');


function textlim($text, $size)
{
    $occur = array('<p>', '</p>');
    $number_of = array();
    $new_text = $text;
    $new_size = $size;
    for ($i = 0; $i < count($occur); $i++) {
        $new_text = str_replace($occur[$i], "", $new_text, $number_of[$i]);
        $new_size = $new_size + (strlen($occur[$i]) * $number_of[$i]);
    }
    $lenght = strlen($new_text);
    if ($lenght > $size + 4) {
        $text = substr($text, 0, $new_size) . '...' . '</p>';
    }
    return $text;
}
function trimpath($path)
{
    $occur = 'uploads/';
    $occur_l = strlen($occur);
    $pos = strpos($path, $occur) + $occur_l;
    $path = substr($path, $pos);
    return $path;
}
