<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_model extends CI_Model
{

    public function getNameKategori()
    {
        $query = "SELECT `post`.*, `kategori`.`name_kategori`
                    FROM `post` 
                    JOIN `kategori`
                    ON `post`.`id_kategori` = `kategori`.`id_kategori`
                    ";
        return $this->db->query($query)->result_array();
    }


    // List post  main page
    public function post()
    {
        $this->db->select('post.*,kategori.name_kategori,kategori.slug_kategori,user.name');
        $this->db->from('post');
        // join
        $this->db->join('kategori', 'kategori.id_kategori = post.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id = post.id_user', 'LEFT');
        // endjoin
        $this->db->where(['status' => 'Publish']);
        $this->db->order_by('id_post', 'DESC');
        $this->db->limit(9);
        $query = $this->db->get();
        return $query->result_array();
    }

    // detail post
    public function detail($slug_post)
    {
        $this->db->select('post.*,kategori.name_kategori,kategori.slug_kategori,user.name');
        $this->db->from('post');
        // join
        $this->db->join('kategori', 'kategori.id_kategori = post.id_kategori', 'LEFT');
        $this->db->join('user', 'user.id = post.id_user', 'LEFT');
        // endjoin
        $this->db->where([
            'status' => 'Publish',
            'post.slug_post' => $slug_post
        ]);
        $this->db->order_by('id_post', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getPost($limit, $start, $keyword = null)
    {
        if($keyword) {
            $this->db->like('title', $keyword);
        }
        $this->db->where(['status' => 'Publish']);
        return $this->db->get('post', $limit, $start)->result_array();
    }

    public function countAllPost()
    {
        return $this->db->get('post')->num_rows();
    }

    public function admin() {
        return $this->db->get('configuration')->row_array();
    }

    public function getPostByKategori($id_kategori) {
        $query = "SELECT * FROM post INNER JOIN kategori ON post.id_kategori=kategori.id_kategori WHERE kategori.id_kategori = $id_kategori";

        return $this->db->query($query)->result_array();
    }
}
