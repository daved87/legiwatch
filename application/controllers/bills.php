<?php

	class bills extends CI_Controller {

	     public function __construct() {
	        parent::__construct();
	        $this->load->model('congress');
	    }	

        public function index() {
    		$data['title'] = 'Bills';

			$this->load->view('templates/head', $data);
			$this->load->view('templates/nav');
			$this->load->view('bills/index', $data);
			$this->load->view('templates/footer');
		}

        //AJAX calls
        function getUpcomingBills ($params = null) {
            $upcomingBills = $this->congress->get('upcoming_bills', $params);
            $upcomingBills = json_decode($upcomingBills, true);


            foreach($upcomingBills as $bill => $val) {
                $p = ['bill_id' => $upcomingBills[$bill]['bill_id']];
                $title = json_decode($this->congress->get('bills', $p), true);
                $upcomingBills[$bill]['bill_info'] = $title;
            }

            echo json_encode($upcomingBills);
        }
	}
?>