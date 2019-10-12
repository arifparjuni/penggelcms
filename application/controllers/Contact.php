<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Contact Us';
        $this->load->view('templates/sejarah_header', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('templates/sejarah_footer');
    }
}
