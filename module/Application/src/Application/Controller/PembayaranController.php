<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PembayaranController extends AbstractActionController{
    private $config;
    private $db;
  
    public function pembayaranAction(){
        $this->config = $this->getServiceLocator()->get('Config'); //mengambil basis data autoconfig
        $this->db = $this->config['db'];
    
        $alam = new \Application\Model\Pembayaran($this->db);
        $data = $alam->read();
        
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode($data));
        return $response;
    }
    
    public function showAlamAction(){ //Ini memunculkan alam melalui view
        return new ViewModel();
    }
    
}

?>