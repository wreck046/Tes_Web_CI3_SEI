class ApiController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
    }

    public function index() {
        // Data dari API
        $api_url = 'http:localhost:8000/v1/api/proyek';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $data['api_data'] = json_decode($response, true);

        // Data dari Database
        $data['db_data'] = $this->Api_model->get_data_from_db();

        // Load view dengan data dari API dan Database
        $this->load->view('Api', $data);
    }
}
