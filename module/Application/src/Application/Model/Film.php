<?php
namespace Application\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

class Film{
    private $adapter;

    public function __construct($config){
    $this->adapter = new Adapter($config);
    }

    public function read($where = null){
        $tableAlam = new TableGateway('film', $this->adapter);
        
        // Tambahkan klausa WHERE jika diberikan
        $rowset = ($where === null) ? $tableAlam->select() : $tableAlam->select($where);
        
        $resultSet = new ResultSet;
        $resultSet->initialize($rowset);
        $data = $resultSet->toArray();
        return $data;
    }

}

?>
