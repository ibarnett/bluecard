<?php
/**
 * Created by PhpStorm.
 * User: Season
 * Date: 5/11/15
 * Time: 2:54 PM
 */

abstract class RestApi {

    protected $method = "";

    protected $verb = "";

    protected $endpoint = "";

    protected $args = Array();

    protected $file = Null;

    public function __construct($request){
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $this->args = explode('/', rtrim($request, '/'));
        $this->endpoint =;
    }

}