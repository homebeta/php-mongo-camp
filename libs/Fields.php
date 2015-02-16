<?php
/**
 * Fields.php
 *
 * @author  lifyang
 * @date    2015/2/16 19:38
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * Class Fields
 *
 * @package MongoCamp
 */
class Fields implements IMongoArray{
    const PRIMARY_KEY = '_id';

    static $All = array();

    protected $FieldList;
    protected $HasPrimaryKey;

    function __construct($showPk = FALSE){
        $this->FieldList = array();
        $this->HasPrimaryKey = $showPk;
    }

    function __get($fieldName){
        if($this->__isset($fieldName)){
            return $this->FieldList[$fieldName];
        }
        return NULL;
    }

    function __set($fieldName, $value){
        if($fieldName == self::PRIMARY_KEY){
            $this->HasPrimaryKey = $value;
        }
        $this->FieldList[$fieldName] = $value;
    }

    function __isset($fieldName){
        return isset($this->FieldList[$fieldName]);
    }

    public function toArray(){
        $fields = array();

        if(!$this->HasPrimaryKey){
            $fields[self::PRIMARY_KEY] = self::toValue($this->HasPrimaryKey);
        }

        foreach($this->FieldList as $name => $isShow){
            $fields[$name] = self::toValue($isShow);
        }

        return $fields;
    }

    private static function toValue($isShow){
        return boolval($isShow) ? 1 : 0;
    }

    function __destruct(){
        unset($this->HasPrimaryKey);
        unset($this->FieldList);
    }


}