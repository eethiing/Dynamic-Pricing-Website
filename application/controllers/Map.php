<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    public function index()
    {
        //$this->load->helper(array('path'));

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('sidebar');
        $this->load->view('map/map');
        $this->load->view('footer');
    }

}
