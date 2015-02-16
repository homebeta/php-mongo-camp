<?php
/**
 * QueryBuilder.php
 *
 * @author  lifyang
 * @date    2015/2/8 17:08
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * Class QueryBuilder
 *
 * @package MongoCamp
 */
class QueryBuilder implements IMongoArray{
    protected $QueryField;
    protected $QueryList;
    protected $SubQueryKey = '';

    function __construct($fieldName){
        $this->QueryList = array();
        $this->setQueryField($fieldName);
    }

    private function setQueryField($fieldName){
        $this->QueryField = $fieldName;
    }

    public static function __callStatic($methodName, $arguments){

    }

    public function toArray(){
        return $this->QueryList;
    }

    public function eq($value){
        if(empty($this->SubQueryKey)){
            $this->QueryList[$this->QueryField] = $value;
        }else{
            $this->addCondition($this->QueryField, $value);
        }

        return $this;
    }

    private function addCondition($command, $value){
        $key = empty($this->SubQueryKey) ? $this->QueryField : $this->SubQueryKey;

        if(empty($this->QueryList[$key])){
            $this->QueryList[$key] = array();
        }

        $this->QueryList[$key][$command] = $value;
    }

    public function andWith($fieldName){
        $this->setQueryField($fieldName);
        return $this;
    }

    public function orWith($fieldName){
        $this->SubQueryKey = QueryCommand::$or;
        $this->setQueryField($fieldName);
        return $this;
    }

    public function orEnd(){
        $this->SubQueryKey = NULL;
        return $this;
    }

    public function __call($cmdName, $arguments){
        // query command
        if(isset(QueryCommand::$$cmdName) && !empty($arguments)){
            $this->addCondition(QueryCommand::$$cmdName, $arguments[0]);
        }
        return $this;
    }


}
