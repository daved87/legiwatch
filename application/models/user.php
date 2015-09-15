<?php

	class user extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->library('encrypt');
        }

	    function email_available($email) {
	        
	        $this->db->select();
	        $this->db->from('users');
	        $this->db->where('email', $email);
	        $query = $this->db->count_all_results();
	        
	        if ($query > 0) {
	        	return false;
	        } else {
	        	return true;
	        }
	    }

	    function login($email, $password) {     
	        $where=array(
	            'email'=>$email,
	            'password'=>sha1($password)
	        );
	        
	        $this->db->select();
	        $this->db->from('users');
	        $this->db->where($where);
	        $query=$this->db->get();
	        
	        return $query->first_row('array');
	    }

	    function create_user($data = null, $location = null) {
     		
	        $emailAlreadyUsed=$this->email_available($data['email']);
	        $data['password'] = sha1($data['password']);
	              
	        if (!$emailAlreadyUsed) {
	            return false;
	        } else {
	            $this->db->insert('users', $data);
	            $id = $this->db->insert_id();

	            if ($id) {
		            $location['user_id'] = $id;
		            $location['default'] = true;
		            $this->addUserLocation($location);
		        } else
		        	return false;

	            return true;
	        }       
	    }

	    function addUserLocation($data = null) {

	    	if ($data['default']) {
		        $this->db->select();
		        $this->db->from('locations');
		        $this->db->where('user_id', $data['user_id']);
		        $this->db->where('default', true);
		        $cnt = $this->db->count_all_results();

    	    	if ($cnt > 0) {
    	    		$this->db->set('default', false);
    	    		$this->db->where('user_id', $data['user_id']);
    	    		$this->db->update('locations');
    	    	}
	    	}

    		$this->db->insert('locations', $data);			
	    }


	    function getUserInformation($user_id = null) {
		        $this->db->select();
		        $this->db->from('users');
		        $this->db->where('user_id', $user_id);
		        $user=$this->db->get();

		        $this->db->select();
		        $this->db->from('locations');
		        $this->db->where('user_id', $user_id);
		        $locations=$this->db->get();

		        $data['user'] = $user;
		        $data['locations'] = $locations;

		        return $data;
	    }	        
	}

?>