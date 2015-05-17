<?php

include "ScoutApi.php";

// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    var_dump($_SERVER);
    var_dump($_REQUEST);
    var_dump(getallheaders());
    var_dump($_GET);
    echo "going to construct ScoutApi";
    $API = new ScoutApi($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
