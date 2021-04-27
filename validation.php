<?php
function santString($value){
    $str = trim($value);
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    return $str;
}

function santEmail($email){
    $email = trim($email);
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    return $email;
}