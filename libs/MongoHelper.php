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

    public static function findOne(MongoServerPack $mongoServer, $collectionName){

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