<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Buku extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('buku_model');
    }

    public function index_get() {
        $buku = $this->buku_model->get_all_buku();
        $this->response($buku, REST_Controller::HTTP_OK);
    }

    public function index_post() {
        $data = array(
            'kode_buku' => $this->post('kode_buku'),
            'isbn' => $this->post('isbn'),
            'judul_buku' => $this->post('judul_buku'),
            'pengarang' => $this->post('pengarang'),
            'sekilas_isi' => $this->post('sekilas_isi'),
            'tanggal_masuk' => $this->post('tanggal_masuk'),
            'stok' => $this->post('stok'),
            'foto' => $this->post('foto')
        );

        $this->buku_model->insert_buku($data);
        $this->response(['Buku berhasil ditambahkan.'], REST_Controller::HTTP_OK);
    }

    public function index_put() {
        $id = $this->put('id');
        $data = array(
            'kode_buku' => $this->put('kode_buku'),
            'isbn' => $this->put('isbn'),
            'judul_buku' => $this->put('judul_buku'),
            'pengarang' => $this->put('pengarang'),
            'sekilas_isi' => $this->put('sekilas_isi'),
            'tanggal_masuk' => $this->put('tanggal_masuk'),
            'stok' => $this->put('stok'),
            'foto' => $this->put('foto')
        );

        $this->buku_model->update_buku($id, $data);
        $this->response(['Buku berhasil diupdate.'], REST_Controller::HTTP_OK);
    }

    public function index_delete() {
        $id = $this->delete('id');
        $this->buku_model->delete_buku($id);
        $this->response(['Buku berhasil dihapus.'], REST_Controller::HTTP_OK);
    }
}
