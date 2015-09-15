<?php

    class users extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('user');
            $this->load->library('form_validation');
            $this->load->model('congress');
        }

        public function index() {
        	$data['title'] = 'Login';

            $this->load->view('templates/head', $data);
            $this->load->view('templates/simpleNav');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }

        public function register() {
            $data['title'] = "Register";
            
            if (!$this->input->post('submit')) {
                $this->load->view('templates/head', $data);
                $this->load->view('templates/simpleNav');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {
                $data = array(
                    'email' => $this->input->post('email'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'password' => $this->input->post('password'),
                    'usertype_id' => 2
                );
                
                $location = [
                    'zipcode' => $this->input->post('zipcode'),
                ];

                $userCreated=$this->user->create_user($data, $location);
                
                if (!$userCreated){
                    $data['error'] = "Something went wrong...Please try again later.";
                    redirect(base_url());
                } else {               
                    $this->login($data['email'], $data['password']);
                }   
            }
        }

        function forgotPassword() {
            $data['title'] = 'Forgot Password';

            $this->load->view('templates/head', $data);
            $this->load->view('templates/simpleNav');
            $this->load->view('users/forgotpassword', $data);
            $this->load->view('templates/footer');            
        }

        function profile($user_id = null) {
            $data['title'] = 'Profile';
            $data['id'] = $user_id;

            if ($user_id !== $this->session->userdata('user_id')) {
                redirect(base_url());
            }
            $query = $this->user->getUserInformation($user_id);

            $data['user'] = $query['user'];
            $data['locations'] = $query['locations'];

            $this->load->view('templates/head', $data);
            $this->load->view('templates/simpleNav');
            $this->load->view('users/profile', $data);
            $this->load->view('templates/footer');             
        }

        public function login($email = null, $password = null) {
            $data['title'] = 'Login';

            if ($this->input->post('submit')) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $remember = $this->input->post('remember');
            }

            $user = $this->user->login($email, $password);

            if ($user) {
                $this->session->set_userdata($user);
                if($remember){
                    $this->session->set_userdata('remember', true);
                }
                redirect(base_url());                           
            } else {
                $data['error'] = 'Your credentials were incorrect.';

                $this->load->view('templates/head', $data);
                $this->load->view('templates/simpleNav');
                $this->load->view('users/index', $data);
                $this->load->view('templates/footer');
            }
        }

        public function loginDialog() {
            $this->load->view('users/miniFormLogin');
        }

        public function logout() {
            $this->session->sess_destroy();
            redirect(base_url());
        }

        public function emailAvailable() {
            $email = $_POST['email'];
            $ret = $this->user->email_available($email);

            echo $ret;
        }

        public function getUserRepresentatives($params = null) {
            $this->load->model('legislator');

            if (!$params) {
                $params['zip'] = $_POST['zip'];
            }
            
            $ret = $this->legislator->legislatorsByLocation($params);           
            echo $ret;
        }

        public function addUserLocation($params = null) {
            $params['user_id'] = $this->input->post('userID');
            $params['zipcode'] = $this->input->post('zipText');
            $params['default'] = false;

            $this->user->addUserLocation($params);
            $this->profile($params['user_id']);

        }
    }
?>