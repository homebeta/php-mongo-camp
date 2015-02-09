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
class QueryCommand{

    /**
     * @var string Equal
     */
    static $eq =  '$eq';
    /**
     * @var string Greater Than
     */
    static $gt = '$gt';
    /**
     * @var string Greater Than or Equal
     */
    static $gte = '$gte';
    /**
     * @var string Less Than or Equal
     */
    static $lt = '$lt';
    /**
     * @var string Less Than or Equal
     */
    static $lte = '$lte';
    /**
     * @var string in query
     */
    static $in = '$in';
    /**
     * @var string where query
     */
    static $where = '$where';
    /**
     * @var string or query
     */
    static $or = '$or';
    /**
     * @var string and query
     */
    static $and = '$and';
    /**
     * @var string elemMatch query
     */
    static $elemMatch = '$elemMatch';

//    static $inc = '$inc';
    //
    //    static $set = '$set';
    //
//    static $unset = '$unset';

}