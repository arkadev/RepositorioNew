<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class torneo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));        
        $this->load->model("torneoModel");
    }

    public function index() {
        $data['teams'] = $this->torneoModel->showTeam();
        $data['tourn'] = $this->torneoModel->createTourn();
        $this->load->view("torneoView", $data);
    }

    public function insertTeam() {
        $data['name'] = $this->input->post("name");
        $this->torneoModel->insertTeam($data);
        echo "Se ha ingresado correctamente el equipo!";
    }

//    public function createTourn() {
//        $data = $this->torneoModel->createTourn();
//        echo "Torneo creado!";
//        return $data;
//    }

}
