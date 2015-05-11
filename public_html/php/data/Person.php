<?php
/**
 * Created by PhpStorm.
 * User: Season
 * Date: 5/6/15
 * Time: 3:57 PM
 */

abstract class Person {

    /**
     * @return mixed
     */
    abstract protected function getName();

    /**
     * @return mixed
     */
    abstract protected function getDob();

    /**
     * @return mixed
     */
    abstract protected function getUnit();
}
?>