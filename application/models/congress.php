<?php
	class congress extends CI_Model {

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

	    public function floor_updates($params = null) {
	    	//params['query', 'chamber', 'legislative_day', 'year', 'bill_ids', 'roll_ids', 'legislator_ids']
	    	$params['apikey'] = $this->key;
	    	
	    	$ret = $this->curl->simple_get($this->url.'floor_updates', $params);

    		if (!empty($ret)) {
    			$ret = json_decode($ret, true);
	    		$ret = $ret["results"];    			
    		} else {
    			$ret = false;
    		}

	    	return $ret;
	    }
	}
?>