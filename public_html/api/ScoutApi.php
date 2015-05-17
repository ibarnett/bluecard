<?php
/**
 * Created by PhpStorm.
 * User: Season
 * Date: 5/13/15
 * Time: 3:17 PM
 */

include "RestApi.php";

class ScoutApi extends RestApi{
    public function __construct($request, $origin){
        parent::__construct($request);
        echo "constructing ScoutApi";
    }

    public function scout($method, $args){
        echo "inside scout method";
        var_dump($method);

        switch($method){
            case "GET":
                echo "Get method";
                break;
            case "POST":
                echo "POST method";
                break;
            case "PUT":
                echo "PUT method";
                break;
            case "DELETE":
                echo "DELETE method";
                break;
        }
    }


}