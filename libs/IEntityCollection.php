<?php
/**
 * IEntityCollection.php
 *
 * @author  lifyang
 * @date    2015/2/7 16:24
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * EntityCollection interface class
 *
 * @package MongoCamp
 */
interface IEntityCollection{

    /**
     * Get current collection name
     *
     * @return string
     */
    public function getCollectionName();

    /**
     * Get current MongoServer configuration package
     *
     * @return MongoServerPack
     */
    public function getMongoServer();

}