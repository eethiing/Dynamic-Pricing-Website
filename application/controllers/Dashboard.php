<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');

        $this->load->view('header');
        $this->load->view('dashboard/dash_header');
        $this->load->view('navbar');
        $this->load->view('sidebar');
        $this->load->view('dashboard/content');
        $this->load->view('footer');
    }
    public function contact_us()
    {
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/navbar');
        $this->load->view('dashboard/sidebar');
        $this->load->view('dashboard/contact-us');
        $this->load->view('dashboard/footer');
    }
}
