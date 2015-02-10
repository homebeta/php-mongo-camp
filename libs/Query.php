<?php
/**
 * Query.php
 *
 * @author  lifyang
 * @date    2015/2/7 20:01
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * Class Query
 *
 * @package MongoCamp
 */
class Query{

    public static function in($fieldName, array $values){
        return array($fieldName => array(QueryCommand::$in => $values));
    }

    public static function gt($fieldName, $value){
        return array($fieldName => array(QueryCommand::$gt => $value));
    }

    public static function where($funcContent){
        return array(QueryCommand::$where => $funcContent);
    }

    public static function eq($fieldName, $value){
        return array($fieldName => $value);
    }


}