<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiController extends CI_Controller {

    private $api_base_url = "http://localhost:8000/v1/api/lokasis"; // URL API Lokasi

    public function __construct() {
        parent::__construct();
        $this->load->library('curl'); // Pastikan library cURL telah di-load
    }

    public function index() {
        // GET request untuk mengambil semua lokasi
        $response = $this->curl->simple_get($this->api_base_url);
        $data['lokasis'] = json_decode($response, true);
        $this->load->view('Lokasi', $data);
    }

    public function view($id) {
        // GET request untuk mengambil lokasi berdasarkan ID
        $url = $this->api_base_url . '/' . $id;
        $response = $this->curl->simple_get($url);
        $data['lokasi'] = json_decode($response, true);
        $this->load->view('Lokasi', $data);
    }

    public function create() {
        // POST request untuk membuat lokasi
        $data = array(
            'name' => $this->input->post('name'),
            // Tambah data lainnya sesuai kebutuhan
        );
        $response = $this->curl->simple_post($this->api_base_url, $data);
        redirect('lokasi');
    }

    public function update($id) {
        // PUT request untuk memperbarui lokasi
        $data = array(
            'name' => $this->input->post('name'),
            // Tambah data lainnya sesuai kebutuhan
        );
        $url = $this->api_base_url . '/' . $id;
        $response = $this->curl->simple_put($url, $data);
        redirect('lokasi');
    }

    public function delete($id) {
        // DELETE request untuk menghapus lokasi
        $url = $this->api_base_url . '/' . $id;
        $response = $this->curl->simple_delete($url);
        redirect('lokasi');
    }
}
