<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function index()
    {
        $data['about'] = $this->db->get('about')->row_array();

        $data['title'] = 'About';

        $this->load->view('templates/sejarah_header', $data);
        $this->load->view('about/index', $data);
        $this->load->view('templates/sejarah_footer');
    }
}
