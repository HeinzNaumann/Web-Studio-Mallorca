<?php
//config.php


require_once 'src/Facebook/autoload.php';

if(!session_id()){
    session_start();


    $facebook = new \Facebook\Facebook([
        'app_id'                => '189513862440229',
        'app_secret'            => '2963a6beabd2153d6d171131a67cc6b5',
        'default_graph_version' => 'v2.10'
    ]);
}


?>