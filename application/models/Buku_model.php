<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function get_all_buku() {
        return $this->db->get('buku')->result();
    }

    public function insert_buku($data) {
        $this->db->insert('buku', $data);
    }

    public function update_buku($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('buku', $data);
    }

    public function delete_buku($id) {
        $this->db->where('id', $id);
        $this->db->delete('buku');
    }
}
