<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

    private $api_url = 'http://localhost:8000/v1/api/lokasis'; // URL API Lokasi

    public function __construct() {
        parent::__construct();
        $this->load->library('curl'); // Pastikan library curl dimuat
    }

    public function get_lokasi($id = null) {
        $url = $this->api_url;
        if ($id !== null) {
            $url .= '/' . $id;
        }

        $response = $this->curl->simple_get($url);
        return json_decode($response, true);
    }

    public function create_lokasi($data) {
        $response = $this->curl->simple_post($this->api_url, $data);
        return json_decode($response, true);
    }

    public function update_lokasi($id, $data) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl->simple_put($url, $data);
        return json_decode($response, true);
    }

    public function delete_lokasi($id) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl->simple_delete($url);
        return json_decode($response, true);
    }
}
?>
