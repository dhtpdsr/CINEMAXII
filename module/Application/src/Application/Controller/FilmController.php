<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
// use Zend\View\Model\ViewModel;

class FilmController extends AbstractActionController{
    private $config;
    private $db;
  
    public function readAction (){
        $this->config = $this->getServiceLocator()->get('Config'); //mengambil basis data autoconfig
        $this->db = $this->config['db'];
    
        $film = new \Application\Model\Film($this->db);
        $data = $film->read();
        
        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode($data));
        return $response;
    }

    public function readdataAction () {
        $request = $this->getRequest();
        $id_film = $request->getQuery('id_film', null); // Mengambil nilai id_film dari query parameter
    
        if ($id_film === null) {
            // Handle jika id_film tidak ditemukan dalam query parameter
            $response = $this->getResponse();
            $response->setStatusCode(400); // Bad Request
            $response->setContent("Parameter id_film tidak ditemukan.");
            return $response;
        }
        $this->config = $this->getServiceLocator()->get('Config'); //mengambil basis data autoconfig
        $this->db = $this->config['db'];
    
        $film = new \Application\Model\Film($this->db);
        $data = $film->read(['id_film' => $id_film]);
        
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