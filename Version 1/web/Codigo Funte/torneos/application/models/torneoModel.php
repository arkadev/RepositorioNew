<?php

class torneoModel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertTeam($data) {
        $this->db->insert('team', $data);
    }

    public function showTeam() {
        $data = $this->db->query("select* from team");
        if ($data->num_rows() > 0) {
            $data = $data->result();
            return $data;
        } else {
            return false;
        }
    }

    public function createTourn() {
        $data = $this->db->query("select * from team order by rand()");
        if ($data->num_rows() > 0) {
            $data = $data->result();
            return $data;
        } else {
            return false;
        }
    }

}
