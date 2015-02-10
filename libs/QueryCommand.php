<?php
/**
 * QueryCommand.php
 *
 * @author  lifyang
 * @date    2015/2/7 20:20
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * Class Query Command
 *
 * @package MongoCamp
 */
final class QueryCommand{

    /**
     * @var string Equal query
     */
    static $eq = '$eq';
    /**
     * @var string Not equal query
     */
    static $ne = '$ne';
    /**
     * @var string Greater than query
     */
    static $gt = '$gt';
    /**
     * @var string Greater than or equal query
     */
    static $gte = '$gte';
    /**
     * @var string Less than or equal query
     */
    static $lt = '$lt';
    /**
     * @var string Less than or equal query
     */
    static $lte = '$lte';
    /**
     * @var string In query
     */
    static $in = '$in';
    /**
     * @var string Not in query
     */
    static $nin = '$nin';
    /**
     * @var string Where javascript function query
     */
    static $where = '$where';
    /**
     * @var string Or query
     */
    static $or = '$or';
    /**
     * @var string And query
     */
    static $and = '$and';
    /**
     * @var string Element value modulo query
     */
    static $mod = '$mod';
    /**
     * @var string Element exists or not exists query
     */
    static $exists = '$exists';
    /**
     * @var string Element value type query
     */
    static $type = '$type';
    /**
     * @var string Not query
     */
    static $not = '$not';

    /**
     * $var string Array element all query
     */
    static $all = '$all';
    /**
     * @var string Array element match query
     */
    static $elemMatch = '$elemMatch';
    /**
     * @var string Array element size query
     */
    static $size = '$size';

}