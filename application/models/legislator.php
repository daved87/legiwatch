<?php 
	class legislator extends CI_Model {

    	public $key = "668537bf3a944df7bfe0b3d13c99f46d";
    	public $url = "http://congress.api.sunlightfoundation.com/";
    	public $openStatesUrl = "openstates.org/api/v1//legislators/";		
    
	    public function legislatorsByLocation($params = null) {
	    	//['latitude', 'longitude', 'zip']   	
	    	$params['apikey'] = $this->key;

	    	$ret = $this->curl->simple_get($this->url.'legislators/locate', $params);

    		if (!empty($ret)) {
    			$ret = json_decode($ret, true);
	    		$ret = json_encode($ret["results"]);    			
    		} else {
    			$ret = false;
    		}

	    	return $ret;
	    }

	    public function legistlatorInformation($params = null) {
	    	//['latitude', 'longitude', 'zip']   	
	    	$params['apikey'] = $this->key;

	    	$ret = $this->curl->simple_get($this->url.'legislators/locate', $params);

    		if (!empty($ret)) {
    			$ret = json_decode($ret, true);
	    		$ret = json_encode($ret["results"]);    			
    		} else {
    			$ret = false;
    		}

	    	return $ret;
	    }

	}
?>