<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyekController extends CI_Controller {

    private $api_base_url = "http://localhost:8000/v1/api/proyeks"; // URL API Proyek

    public function __construct() {
        parent::__construct();
        $this->load->library('curl'); // Pastikan library cURL telah di-load
    }

    public function index() {
        // GET request untuk mengambil semua proyek
        $response = $this->curl->simple_get($this->api_base_url);
        $data['proyeks'] = json_decode($response, true);
        $this->load->view('Proyek', $data);
    }

    // public function view($id) {
    //     // GET request untuk mengambil proyek berdasarkan ID
    //     $url = $this->api_base_url . 'http://localhost:8000/v1/api/proyeks' . $id;
    //     $response = $this->curl->simple_get($url);
    //     $data['proyek'] = json_decode($response, true);
    //     $this->load->view('Proyek', $data);
    // }

    public function view($id) {
        $url = $this->api_base_url . 'http://localhost:8000/v1/api/proyeks' . $id;
        $response = $this->curl->simple_get($url);
        $data['proyeks'] = json_decode($response, true);
    
        // Debug output
        var_dump($data['proyeks']);
        exit; // Hentikan eksekusi untuk melihat hasil
    }
    

    public function create() {
        // POST request untuk membuat proyek
        $data = array(
            'name' => $this->input->post('name'),
            // Tambah data lainnya sesuai kebutuhan
        );
        $response = $this->curl->simple_post($this->api_base_url, $data);
        redirect('Proyek');
    }

    public function update($id) {
        // PUT request untuk memperbarui proyek
        $data = array(
            'name' => $this->input->post('name'),
            // Tambah data lainnya sesuai kebutuhan
        );
        $url = $this->api_base_url . 'http://localhost:8000/v1/api/proyeks/{id}' . $id;
        $response = $this->curl->simple_put($url, $data);
        redirect('Proyek');
    }

    public function delete($id) {
        // DELETE request untuk menghapus proyek
        $url = $this->api_base_url . 'http://localhost:8000/v1/api/proyeks{id}' . $id;
        $response = $this->curl->simple_delete($url);
        redirect('Proyek');
    }
    
}
