<?php
	class bill extends CI_Model {

    	public $key = "668537bf3a944df7bfe0b3d13c99f46d";
    	public $url = "http://congress.api.sunlightfoundation.com/";		
    
	    public function get($method = null, $params = null) {   	
	    	$params['apikey'] = $this->key;

	    	$ret = $this->curl->simple_get($this->url.$method, $params);

    		if (!empty($ret)) {
    			$ret = json_decode($ret, true);
	    		$ret = json_encode($ret["results"]);    			
    		} else {
    			$ret = false;
    		}

	    	return $ret;
	    }

	    public function billSearch($params = null) {   	
	    	$params['apikey'] = $this->key;

	    	$ret = $this->curl->simple_get($this->url.'bills/search', $params);

    		if (!empty($ret)) {
    			$ret = json_decode($ret, true);
	    		$ret = $ret["results"];    			
    		} else {
    			$ret = false;
    		}

	    	return $ret[0];
	    }
	}

?>