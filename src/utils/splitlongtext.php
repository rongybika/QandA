<?php

function breakLongTextBody($text, $length = 200, $maxLength = 250)
{
    $text = str_replace('? ', '?<br />', $text);
    $text = str_replace('! ', '?<br />', $text);
    
    //Text length
    $textLength = strlen($text);

    //initialize empty array to store split text
    //$splitText = array();
    $splitText = "";

    //return without breaking if text is already short
    if (!($textLength > $maxLength)) {
        //$splitText[] = '<p>' . $text . '</p>';
        $splitText = '<p>' . $text . '</p>';
        return $splitText;
    }

    //Guess sentence completion
    if (strpos($text, '!') !== false) {
        $needle = '!';
    }
    
    if (strpos($text, '?') !== false) {
        $needle = '?';
    }
    
    if (strpos($text, '.') !== false) {
        $needle = '.';
    }
    
    /*iterate over $text length 
   as substr_replace deleting it*/
    while (strlen($text) > $length) {

        $end = strpos($text, $needle, $length);

        if ($end === false) {

            //Returns FALSE if the needle (in this case ".") was not found.
            $splitText = $splitText . '<p>' . substr($text, 0) . '</p>';
            $text = '';
            break;
        }

        $end++;
        $splitText = $splitText . '<p>' . substr($text, 0, $end) . '</p>';
        $text = substr_replace($text, '', 0, $end);
    }

    if ($text) {
        $splitText = $splitText . '<p>' . substr($text, 0) . '</p>';
    }

    return $splitText;
}

function breakLongTextComment($text, $length = 200, $maxLength = 250)
{
    
    $text = str_replace('? ', '?<br />', $text);
    $text = str_replace('! ', '?<br />', $text);
    
    //Text length
    $textLength = strlen($text);

    //initialize empty array to store split text
    //$splitText = array();
    $splitText = "";

    //return without breaking if text is already short
    if (!($textLength > $maxLength)) {
        //$splitText[] = '<p>' . $text . '</p>';
        $splitText = $text;
        return $splitText;
    }

    //Guess sentence completion
    if (strpos($text, '!') !== false) {
        $needle = '!';
    }
    
    if (strpos($text, '?') !== false) {
        $needle = '?';
    }
    
    if (strpos($text, '.') !== false) {
        $needle = '.';
    }

    /*iterate over $text length 
   as substr_replace deleting it*/
    while (strlen($text) > $length) {

        $end = strpos($text, $needle, $length);

        if ($end === false) {

            //Returns FALSE if the needle (in this case ".") was not found.
            $splitText = $splitText . substr($text, 0);
            $text = '';
            break;
        }

        $end++;
        $splitText = $splitText . substr($text, 0, $end);
        $text = substr_replace($text, '', 0, $end);
    }

    if ($text) {
        $splitText = $splitText . substr($text, 0);
    }

    return $splitText;
}
