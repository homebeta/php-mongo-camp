<?php
/**
 * MongoServerPack.php
 *
 * @author  lifyang
 * @date    2015/2/7 16:28
 * @package MongoCamp
 */

namespace MongoCamp;

/**
 * MongoDB Server configuration package
 *
 * @package MongoCamp
 */
class MongoServerPack{

    private $_dbName;
    private $_connectionString;

    private $_mongoClient = NULL;
    private $_mongoOptions = NULL;

    /**
     * @param string $connectionString
     * @param string $dbName
     * @param array  $options
     *
     * @throws \MongoConnectionException($connectionString is empty)
     */
    function __construct($connectionString, $dbName, array $options = NULL){
        $errorArgv = array();

        if(empty($dbName)){
            array_push($errorArgv, '$dbName is empty');
        }
        if(empty($connectionString)){
            array_push($errorArgv, '$connectionString is empty');
        }

        if(empty($errorArgv)){
            $this->_connectionString = $connectionString;
            $this->_mongoOptions = $options;
            $this->_dbName = $dbName;
        }else{
            $errorMsg = implode(' , ', $errorArgv);
            throw new \MongoConnectionException($errorMsg, 100);
        }
    }

    /**
     * @param string $dbName
     *
     * @return \MongoDB
     */
    public function getDb($dbName = ''){
        $dbName = $this->defaultDbName($dbName);

        return $this->getServer()->selectDB($dbName);
    }

    /**
     * @param string $dbName
     *
     * @return string
     */
    public function defaultDbName($dbName = ''){
        if(empty($dbName)){
            return $this->_dbName;
        }
        return $dbName;
    }

    /**
     * @return \MongoClient|null
     */
    public function getServer(){
        if(is_null($this->_mongoClient)){
            $this->initServer();
        }

        return $this->_mongoClient;
    }

    private function initServer(){
        if(is_null($this->_mongoOptions)){
            $this->_mongoClient =  new \MongoClient($this->_connectionString);
        }else{
            $this->_mongoClient = new \MongoClient($this->_connectionString, $this->_mongoOptions);
        }
    }

    /**
     * @param string $collectionName
     * @param string $dbName
     *
     * @return bool
     */
    public function dropCollection($collectionName, $dbName = ''){
        $result = $this->getCollection($collectionName, $dbName)->drop();

        return !(empty($result) || empty($result['ok']));
    }

    /**
     * @param string $collectionName
     * @param string $dbName
     *
     * @return \MongoCollection
     */
    public function getCollection($collectionName, $dbName = ''){
        $dbName = $this->defaultDbName($dbName);

        return $this->getServer()->selectCollection($dbName, $collectionName);
    }

}