<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

    private $api_url = 'http://localhost:8000/v1/api/proyeks'; // URL API Proyek

    public function __construct() {
        parent::__construct();
        $this->load->library('curl'); // Pastikan library curl dimuat
    }

    public function get_proyek($id = null) {
        $url = $this->api_url;
        if ($id !== null) {
            $url .= 'http://localhost:8000/v1/api/proyeks' . $id;
        }

        $response = $this->curl->simple_get($url);
        return json_decode($response, true);
    }

    public function create_proyek($data) {
        $response = $this->curl->simple_post($this->api_url, $data);
        return json_decode($response, true);
    }

    public function update_proyek($id, $data) {
        $url = $this->api_url . 'http://localhost:8000/v1/api/proyeks/{id}' . $id;
        $response = $this->curl->simple_put($url, $data);
        return json_decode($response, true);
    }

    public function delete_proyek($id) {
        $url = $this->api_url . 'http://localhost:8000/v1/api/proyeks/{id}' . $id;
        $response = $this->curl->simple_delete($url);
        return json_decode($response, true);
    }
}
?>
