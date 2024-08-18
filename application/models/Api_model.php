class Api_model extends CI_Model {
    public function get_data_from_db() {
        $query = $this->db->get('nama_tabel');
        return $query->result_array();
    }
}
