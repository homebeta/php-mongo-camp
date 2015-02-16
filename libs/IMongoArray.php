<?php
/**
 * IMongoArray.php
 *
 * @author  lifyang
 * @date    2015/2/7 22:04
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * Interface IMongoArray
 *
 * @package MongoCamp
 */
interface IMongoArray{

    /**
     * get mongo array
     * @return array
     */
    public function toArray();
}