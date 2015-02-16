<?php
/**
 * SortBy.php
 *
 * @author  lifyang
 * @date    2015/2/16 19:43
 * @package MongoCamp
 */

namespace MongoCamp;


class SortBy implements IMongoArray{
    protected $SortList;

    function __construct(){
        $this->SortList = array();
    }

    public static function descending($params){
        
    }

    public static function ascending($params){

    }

    public function toArray(){
        return $this->SortList;
    }
}