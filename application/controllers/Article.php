<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function index()
    {
        $this->load->view('article/index');
    }

    public function About()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['about'] = $this->db->get('about')->result_array();

        $data['title'] = 'About' . ' ( ' . count($data['about'])  . ' ) ';

        $this->form_validation->set_rules('title', 'Title', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('article/about', $data);
            $this->load->view('templates/footer');
        } else {
            $title = $this->input->post('title');
            $deskritpion = $this->input->post('deskription');
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/article/img/about/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                    die();
                } else {
                    $data = [
                        'title' => $this->input->post('title'),
                        'deskription' => $this->input->post('deskription'),
                        'image' => $this->upload->data('file_name')
                    ];

                    $this->db->insert('about', $data);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New About Added!</div>');
                    redirect('article/about');
                }
            }
        }
    }

    public function editAbout($id_about)
    {
        $data['title'] = 'Edit About';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['about'] = $this->db->get_where('about', ['id_about' => $id_about])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('deskription', 'Deskription', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('article/editAbout', $data);
            $this->load->view('templates/footer');
        } else {
            $id_about = $this->input->post('id_about');
            $title = $this->input->post('title');
            $deskription = $this->input->post('deskription');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/article/img/about/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                    die();
                } else {
                    $upload_image = $this->upload->data('file_name');
                    $old_image = $data['about']['image'];
                    if ($old_image != "") {
                        unlink('./assets/article/img/about/' . $old_image);
                    }

                    $data = [
                        'id_about' => $id_about,
                        'title' => $title,
                        'deskription' => $deskription,
                        'image' => $upload_image
                    ];

                    $this->db->where('id_about', $id_about);
                    $this->db->update('about', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">About has been updated!</div>');
                    redirect('article/about');
                }
            }

            $data = [
                'id_about' => $this->input->post('id_about'),
                'title' => $this->input->post('title'),
                'deskription' => $this->input->post('deskription')
            ];

            $this->db->where('id_about', $id_about);
            $this->db->update('about', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">About has been updated!</div>');
            redirect('article/about');
        }
    }

    public function deleteAbout($id_about)
    {

        $about = $this->db->get_where('about', ['id_about' => $id_about])->row_array();

        if ($about['image'] != "") {
            unlink('./assets/article/img/about/' . $about['image']);
        }

        $this->db->where('id_about', $id_about);
        $this->db->delete('about');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">About success Delete!</div>');
        redirect('article/about');
    }

    public function post()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Article_model', 'article');

        $data['post'] = $this->article->getNameKategori();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $data['title'] = 'Post' . ' ( ' . count($data['post'])  . ' ) ';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('article/post', $data);
        $this->load->view('templates/footer');
    }

    public function addPost()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['post'] = $this->db->get('post')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $data['title'] = 'Add Post';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('article/add-post', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $id_kategori = $this->input->post('id_kategori');
            $slug_post = url_title($this->input->post('title'), 'dash', TRUE);
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $upload_image = $_FILES['image'];
            $status = $this->input->post('status');

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/article/img/post/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                    die();
                } else {
                    $data = [
                        'id_user' => $this->input->post('id_user'),
                        'id_kategori' => $this->input->post('id_kategori'),
                        'slug_post' => url_title($this->input->post('title'), 'dash', TRUE),
                        'title' => $this->input->post('title'),
                        'body' => $this->input->post('body'),
                        'status' => $this->input->post('status'),
                        'image' => $this->upload->data('file_name'),
                        'date_post' => date('Y-m-d H:i:s')
                    ];

                    $this->db->insert('post', $data);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Post Added!</div>');
                    redirect('article/post');
                }
            }
        }
    }


    public function editPost($id_post)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['post'] = $this->db->get_where('post', ['id_post' => $id_post])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $data['title'] = 'Edit Post';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('article/edit-post', $data);
            $this->load->view('templates/footer');
        } else {
            $id_post = $this->input->post('id_post');
            $id_user = $this->input->post('id_user');
            $id_kategori = $this->input->post('id_kategori');
            $slug_post = url_title($this->input->post('title'), 'dash', TRUE);
            $title = $this->input->post('title');
            $body = $this->input->post('body');
            $upload_image = $_FILES['image']['name'];
            $status = $this->input->post('status');

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/article/img/post/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                    die();
                } else {
                    $upload_image = $this->upload->data('file_name');

                    if ($data['post']['image'] != "") {
                        unlink('./assets/article/img/post/' . $data['post']['image']);
                    }

                    $data = [
                        'id_post' => $this->input->post('id_post'),
                        'id_user' => $this->input->post('id_user'),
                        'id_kategori' => $this->input->post('id_kategori'),
                        'slug_post' => url_title($this->input->post('title'), 'dash', TRUE),
                        'title' => $this->input->post('title'),
                        'body' => $this->input->post('body'),
                        'status' => $this->input->post('status'),
                        'image' => $upload_image,
                        'date_post' => date('Y-m-d H:i:s')
                    ];

                    $this->db->where('id_post', $id_post);
                    $this->db->update('post', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post has been updated!</div>');
                    redirect('article/post');
                }
            }

            $data = [
                'id_post' => $this->input->post('id_post'),
                'id_user' => $this->input->post('id_user'),
                'id_kategori' => $this->input->post('id_kategori'),
                'slug_post' => url_title($this->input->post('title'), 'dash', TRUE),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'status' => $this->input->post('status'),
                'date_post' => date('Y-m-d H:i:s')
            ];

            $this->db->where('id_post', $id_post);
            $this->db->update('post', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post has been updated!</div>');
            redirect('article/post');
        }
    }

    public function deletePost($id_post)
    {
        $post = $this->db->get_where('post', ['id_post' => $id_post])->row_array();

        if ($post['image'] != "") {
            unlink('./assets/article/img/post/' . $post['image']);
        }

        $this->db->where('id_post', $id_post);
        $this->db->delete('post');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Post success Delete!</div>');
        redirect('article/post');
    }


    public function kategori()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $data['title'] = 'Kategori' . ' ( ' . count($data['kategori'])  . ' ) ';

        $this->form_validation->set_rules('name_kategori', 'Name Kategori', 'required|is_unique[kategori.name_kategori]', [
            'is_unique' => 'Kategori Added!, Create new name kategori'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('article/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $name_kategori = $this->input->post('name_kategori');
            $slug_kategori = url_title($this->input->post('name_kategori'), 'dash', TRUE);
            $urutan = $this->input->post('urutan');

            $data = [
                'name_kategori' => $name_kategori,
                'slug_kategori' => $slug_kategori,
                'urutan' => $urutan
            ];

            $this->db->insert('kategori', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Kategori Added!</div>');
            redirect('article/kategori');
        }
    }

    public function editKategori($id_kategori)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();

        $data['title'] = 'Edit Kategori';

        $this->form_validation->set_rules('name_kategori', 'Name Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('article/edit-kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $id_kategori = $this->input->post('id_kategori');
            $name_kategori = $this->input->post('name_kategori');
            $slug_kategori = url_title($this->input->post('name_kategori'), 'dash', TRUE);
            $urutan = $this->input->post('urutan');

            $data = [
                'name_kategori' => $name_kategori,
                'slug_kategori' => $slug_kategori,
                'urutan' => $urutan
            ];

            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Update!</div>');
            redirect('article/kategori');
        }
    }

    public function deleteKategori($id_kategori)
    {

        $about = $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();

        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori success Delete!</div>');
        redirect('article/kategori');
    }

}
