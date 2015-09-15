<?php
    class main extends CI_Controller {

         public function __construct() {
            parent::__construct();
            $this->load->model('congress');
            $this->load->model('bill');
        }

        public function index() {
            date_default_timezone_set("America/New_York");
        	$data['title'] = 'Home';

            if ($this->session->has_userdata('user_id')) {
                $data['user_id'] = $this->session->userdata('user_id');
                $data['firstname'] = $this->session->userdata('firstname');
                $data['lastname'] = $this->session->userdata('lastname'); 
            }

            $params = ['legislative_day' => date('Y-m-d')];
            $query = $this->congress->floor_updates($params);
            $floor_updates = array(); 

            foreach ($query as $update) {
                if ($update['bill_ids']) {

                    foreach ($update['bill_ids'] as $bill => $bill_id) {
                        $bill_ids[$bill] = $this->bill->billSearch(['bill_id' => $bill_id]);
                    }
                    $update['bill_ids'] = $bill_ids;
                }

                $floor_updates[] = $update;             
            }  
            $data['floor_updates'] = $floor_updates;                     

    		$this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
    		$this->load->view('index', $data);
    		$this->load->view('templates/footer');
        }

        public function about() {
            $data['title'] = 'About';

            $this->load->view('templates/head', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('about');
            $this->load->view('templates/footer');
        }

        //AJAX CALLS//
        public function floor_updates($params = null) {

        }

    }
?>