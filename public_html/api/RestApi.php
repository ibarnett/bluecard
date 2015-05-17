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

    protected $request = Null;

    private function _cleanInputs($data) {
        $clean_input = Array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }

    private function _response($data, $status = 200) {
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        return json_encode($data);
    }

    public function processAPI() {
        echo "process api";
        if ((int)method_exists($this, $this->endpoint) > 0) {
            return $this->_response($this->{$this->endpoint}($this->method, $this->args));
        }
        return $this->_response("No Endpoint: $this->endpoint", 404);
    }

    private function _requestStatus($code) {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }

    public function __construct($request){
        echo "constructing parent RestAPI";
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        echo "args \n";
        $this->args = explode('/', rtrim($request, '/'));
        var_dump($this->args);

        echo "endpoint \n";
        $this->endpoint = array_shift($this->args);
        var_dump($this->endpoint);
        var_dump($this->args);


        echo "verb \n";
        if(count($this->args) && !is_numeric($this->args[0])){
            $this->verb = array_shift($this->args);
        }

        echo "method \n";
        $this->method = $_SERVER["REQUEST_METHOD"];
        var_dump($this->method);

        if($this->method == "POST" && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)){
            $this->method = $_SERVER['HTTP_X_HTTP_METHOD'];
        }



        switch($this->method){
            case "DELETE":
            case "POST":
                $this->$request = $this->_cleanInputs($_POST);
                break;
            case "PUT":
                $this->$request = $this->_cleanInputs($_GET);
                $this->$file = file_get_contents("php://input");
                break;
            case "GET":
                $this->$request = $this->_cleanInputs($_GET);
                break;
            default:
                $this->_response('Invalid Method', 405);

        }
    }



}