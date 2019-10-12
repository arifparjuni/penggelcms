<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user_menu = $this->db->get('user_menu')->result_array();
        $data['user_menu'] = count($user_menu);

        $post = $this->db->get('post')->result_array();
        $data['post'] = count($post);

        $kategori_post = $this->db->get('kategori')->result_array();
        $data['kategori_post'] = count($kategori_post);

        $role = $this->db->get('user_role')->result_array();
        $data['role'] = count($role);

        $data['configuration'] = $this->db->get('configuration')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role', true)
            ];

            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Added!</div>');
            redirect('admin/role');
        }
    }

    public function editRole($id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editRole', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'role' => $this->input->post('role', true)
            ];

            $this->db->where('id', $id);
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Role Success!</div>');
            redirect('admin/role');
        }
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id != ', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function deleteRole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete data success!</div>');
        redirect('admin/role');
    }

    public function configuration()
    {
        $data['title'] = 'My Configuration';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['configuration'] = $this->db->get('configuration')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/configuration', $data);
        $this->load->view('templates/footer');
    }

    // edit configuration
    public function editConfiguration($id_configuration)
    {
        $data['title'] = 'Edit Configuration';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['configuration'] = $this->db->get_where('configuration', ['id_configuration' => $id_configuration])->row_array();

        $this->form_validation->set_rules('name_company', 'Name Company', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('deskription', 'Deskription', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editConfiguration', $data);
            $this->load->view('templates/footer');
        } else {
            $id_configuration = $this->input->post('id_configuration', true);
            $name_company = htmlspecialchars($this->input->post('name_company', true));
            $email = $this->input->post('email', true);
            $phone = $this->input->post('phone', true);
            $address = $this->input->post('address', true);
            $website = $this->input->post('website', true);
            $deskription = $this->input->post('deskription', true);
            $facebook = $this->input->post('facebook', true);
            $instagram = $this->input->post('instagram', true);
            $twitter = $this->input->post('twitter', true);
            $time = time();

            // if upload image
            $logo = $_FILES['logo']['name'];

            if ($logo) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/article/img/logo/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {

                    echo $this->upload->display_errors();
                    die();
                } else {
                    $logo = $this->upload->data('file_name');

                    if ($data['configuration']['logo'] != "") {
                        unlink('./assets/article/img/logo/' . $data['configuration']['logo']);
                    }

                    $data = [
                        'id_configuration' => $id_configuration,
                        'name_company' => $name_company,
                        'email' => $email,
                        'phone' => $phone,
                        'address' => $address,
                        'website' => $website,
                        'deskription' => $deskription,
                        'logo' => $logo,
                        'facebook' => $facebook,
                        'instagram' => $instagram,
                        'time' => $time
                    ];

                    $this->db->where('id_configuration', $id_configuration);
                    $this->db->update('configuration', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your configuration has been updated!</div>');
                    redirect('admin/configuration');
                }
            }

            $data = [
                'id_configuration' => $this->input->post('id_configuration', true),
                'name_company' => htmlspecialchars($this->input->post('name_company', true)),
                'email' => $this->input->post('email', true),
                'phone' => $this->input->post('phone', true),
                'address' => $this->input->post('address', true),
                'website' => $this->input->post('website', true),
                'deskription' => $this->input->post('deskription', true),
                'facebook' => $this->input->post('facebook', true),
                'instagram' => $this->input->post('instagram', true),
                'twitter' => $this->input->post('twitter', true),
                'time' => time()
            ];

            $this->db->where('id_configuration', $id_configuration);
            $this->db->update('configuration', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your configuration has been updated!</div>');
            redirect('admin/configuration');
        }
    }

    public function datauser()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['datauser'] = $this->admin->getRole();

        $data['title'] = 'Data User ( ' . count($data['datauser']) . ' )';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datauser', $data);
        $this->load->view('templates/footer');
    }
}
