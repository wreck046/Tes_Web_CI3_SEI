<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyekController extends CI_Controller {

    private $api_base_url = "http://localhost:8000/v1/api/proyeks"; // URL API Proyek

    public function __construct() {
        parent::__construct();
        $this->load->library('curl'); // Pastikan library cURL telah di-load
    }

    public function index() {
        $url = 'http://localhost:8000/v1/api/proyeks';
        
        // Menggunakan CURL untuk mengambil data dari API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['data']) && is_array($responseData['data'])) {
            $data['proyeks'] = $responseData['data'];
        } else {
            $data['proyeks'] = []; // Atur ke array kosong jika tidak ada data
        }
    
        // Pass data ke view
        $this->load->view('Proyek', $data);

        $data['proyeks'] = json_decode($response, true); // Pastikan variabel 'proyeks' terdefinisi
        $this->load->view('Proyek', $data); // Pass variabel $data ke view
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
