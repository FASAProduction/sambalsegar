<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get($where = null){
        if($where != null){
            $this->db->where($where);
        }

        return $this->db->get('admin');
    }

    public function insert(){
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'telepon' => $this->input->post('telepon'),
        ];

        $this->db->insert('admin', $data);
    }

    public function update($id_admin){
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
        ];

        if($this->input->post('password') != ''){
            $data['password'] = sha1($this->input->post('password'));
        }

        $this->db->update('admin', $data, ['id_admin' => $id_admin]);
    }

    public function delete($id_admin){
        $this->db->delete('admin', ['id_admin' => $id_admin]);
    }

    public function change_password($id_admin){
        $data = [
            'password' => sha1($this->input->post('password_baru')),
        ];

        $this->db->update('admin', $data, ['id_admin' => $id_admin]);
    }

}