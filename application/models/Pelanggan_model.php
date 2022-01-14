<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    public function get($where = null){
        if($where != null){
            $this->db->where($where);
        }

        return $this->db->get('pelanggan');
    }

    public function insert(){
        $data = [
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        ];

        $this->db->insert('pelanggan', $data);
    }

    public function update($id_pelanggan){
        $data = [
            'email' => $this->input->post('email'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
        ];

        if($this->input->post('password') != ''){
            $data['password'] = sha1($this->input->post('password'));
        }

        $this->db->update('pelanggan', $data, ['id_pelanggan' => $id_pelanggan]);
    }

    public function delete($id_pelanggan){
        $this->db->delete('pelanggan', ['id_pelanggan' => $id_pelanggan]);
    }

}