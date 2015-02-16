<?php
/**
 * MongoHelper.php
 *
 * @author  lifyang
 * @date    2015/2/7 19:26
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * MongoDB generic access and operate class
 *
 * @package MongoCamp
 */
final class MongoHelper{

    /**
     * @param MongoServerPack $mongoServer
     * @param string          $collectionName
     * @param mixed           $pkValue
     * @param bool            $isMongoId
     * @param array           $fields
     *
     * @return array
     */
    public static function findById(MongoServerPack $mongoServer, $collectionName, $pkValue, $fields = array(), $isMongoId = FALSE){
        if($isMongoId){
            $pkValue = new \MongoId($pkValue);
        }
        $query = array(Fields::PRIMARY_KEY => $pkValue);

        return self::findOne($mongoServer, $collectionName, $query, $fields);
    }

    /**
     * find one
     *
     * @param MongoServerPack $mongoServer
     * @param string          $collectionName
     * @param array           $query
     * @param array           $fields
     * @param array           $orderBy
     *
     * @return array
     */
    public static function findOne(MongoServerPack $mongoServer, $collectionName, $query = array(), $fields = array(), $orderBy = array()){
        $query = self::toArray($query);
        $fields = self::toArray($fields);
        $orderBy = self::toArray($orderBy);

        if(empty($orderBy)){
            $collection = $mongoServer->getCollection($collectionName);
            return $collection->findOne($query, $fields);
        }

        return self::findList($mongoServer, $collectionName, $query, $fields, $orderBy, 1);
    }

    public static function toArray($mongoArray){
        if(empty($mongoArray)){
            return array();
        }
        if(is_array($mongoArray)){
            return $mongoArray;
        }
        if(is_a($mongoArray, 'IMongoArray')){
            return $mongoArray->toArray();
        }
        return array();
    }

    /**
     * @param MongoServerPack $mongoServer
     * @param string          $collectionName
     * @param array           $query
     * @param array           $fields
     * @param array           $orderBy
     * @param int             $limitCount
     * @param int             $startIndex
     * @param null            $recordCount
     *
     * @return array
     */
    public static function fineList(MongoServerPack $mongoServer, $collectionName, $query = array(), $fields = array(), $orderBy = array(), $limitCount = 0, $startIndex = 0, &$recordCount = NULL){
        $collection = $mongoServer->getCollection($collectionName);
        $query = self::toArray($query);

        if(!is_null($recordCount)){
            $recordCount = $collection->count($query);
            if($recordCount == 0){
                return array();
            }
        }

        $mongoCursor = $collection->find($query, self::toArray($fields));

        if($limitCount > 0){
            $mongoCursor->limit($limitCount);
        }
        if($startIndex > 0){
            $mongoCursor->skip($startIndex);
        }

        $orderBy = self::toArray($orderBy);
        if(!empty($orderBy)){
            $mongoCursor->sort($orderBy);
        }

        return iterator_to_array($mongoCursor);
    }

    /**
     * @param MongoServerPack $mongoServer
     * @param string          $collectionName
     * @param array           $query
     *
     * @return int
     */
    public static function getCount(MongoServerPack $mongoServer, $collectionName, $query = array()){
        $collection = $mongoServer->getCollection($collectionName);

        return $collection->count(self::toArray($query));
    }

    //public static findOne<TEntityClass>(MongoServerPack mongoServer, string collectionName, object primaryKeyOrIMongoQuery){
    //TEntityClass entity;
    //var db = mongoServer.GetDefaultDB();
    //
    //using (db.RequestStart()){
    //var collection = db.GetCollection<TEntityClass>(collectionName);
    //
    //if(primaryKeyOrIMongoQuery is IMongoQuery)
    //entity = collection.FindOneAs<TEntityClass>(primaryKeyOrIMongoQuery as IMongoQuery);
    //else
    //entity = collection.FindOneByIdAs<TEntityClass>(primaryKeyOrIMongoQuery.ToBsonValue());
    //}
    //
    //return entity;
    //}
}