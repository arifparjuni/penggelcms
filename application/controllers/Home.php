<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model', 'article');
        $this->load->helper('text');
    }


    public function index()
    {
        $data['title'] = 'Home';
        $this->load->model('Article_model', 'article');
        $data['about'] = $this->db->get('about')->row_array();


        //pagination
        $this->load->library('pagination');

        // ambil data keyword
        if($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $this->db->like('title', $data['keyword']);
        $this->db->from('post');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;


        // initialize
        $this->pagination->initialize($config);


        // $data['post'] = $this->article->post();
        $data['start'] = $this->uri->segment(3);
        $data['post'] = $this->article->getPost($config['per_page'], $data['start'], $data['keyword']);

        $data['admin'] = $this->article->admin();
        $data['allpost'] = $this->article->getNameKategori();
        $data['allkategori'] = $this->db->get('kategori')->result_array();


        $this->load->view('templates/article_header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/article_footer');
    }

    public function detail($slug_post)
    {
        $this->load->model('Article_model', 'article');
        $data['post'] = $this->article->detail($slug_post);
        $data['title'] = 'Detail';

        $this->load->view('templates/article_header', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('templates/article_footer');
    }

    public function kategori($id_kategori)
    {   
        $data['title'] = 'category';
        $data['allPost'] = $this->article->getPostByKategori($id_kategori);
        $data['allkategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/article_header',$data);
        $this->load->view('home/all-kategori',$data);
        $this->load->view('templates/article_footer');
    }

    public function about()
    {   
        $data['title'] = 'about';
        $data['about'] = $this->db->get('about')->row_array();

        $this->load->view('templates/article_header',$data);
        $this->load->view('home/about',$data);
        $this->load->view('templates/article_footer');
    }

    public function contact()
    {   
        $data['title'] = 'contact';

        $this->load->view('templates/article_header',$data);
        $this->load->view('home/contact',$data);
        $this->load->view('templates/article_footer');
    }
}
