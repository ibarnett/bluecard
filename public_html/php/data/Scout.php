<?php
/**
 * Created by PhpStorm.
 * User: Season
 * Date: 5/6/15
 * Time: 4:01 PM
 */

include "Person.php";


class Scout extends Person{

    private $name;
    private $dob;
    private $unit;
    private $rank;

    function __construct($name, $dob, $unit, $rank){
        $this->name = $name;
        $this->dob = $dob;
        $this->unit = $unit;
        $this->rank = $rank;

        echo "In Scout Constructor";
    }

    public function getName(){
        return $this->name;
    }

    public function getDob(){
        return $this->dob;
    }

    public function getUnit(){
        return $this->unit;
    }

    public function getRank(){
        return $this->rank;
    }
}