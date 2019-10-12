<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oops extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Oops!';
        $this->load->view('oops/index', $data);
    }
}
