<?php
/**
 * PrimaryKey.php
 *
 * @author  lifyang
 * @date    2015/2/7 18:49
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * The collection unique value class
 *
 * @package MongoCamp
 */
class PrimaryKey{

    const FIELD_NAME = "_id";

    /**
     * Generates a new MongoId
     *
     * @return string
     */
    public static function generateNewId(){
        $objectId = new \MongoId();

        return $objectId->id;
    }

    /**
     * Generates a new Globals Unique Identifiers
     *
     * @return string
     */
    public static function generateNewGUID(){
        if(function_exists('com_create_guid') === TRUE){
            return trim(com_create_guid(), '{}');
        }

        return strtoupper(md5(uniqid(__FILE__, TRUE) . mt_rand()));
    }
}