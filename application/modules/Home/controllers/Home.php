<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of site
 *
 * @author https://www.roytuts.com
 */
class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
   
        $this->load->view('home');
    }
    function ajax() {
	    $keywords = array();
	    $keyword=$_GET['query'];
	    if($_GET['query']){
	    $data = file_get_contents('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q='.urlencode($keyword));
	    // ==============
	    if (($data = json_decode($data, true)) !== null) {
	        $keywords = $data[1];
	        header('Content-Type: application/json');
			echo json_encode($keywords);
	    }else{
	    	$keywords = array('No data found.');
	    	header('Content-Type: application/json');
			echo json_encode($keywords);
	    }
		}else{
			$keywords = array('No data found.');
		    	header('Content-Type: application/json');
				echo json_encode($keywords);
			
	    }
	}
	function view(){
		$this->load->view('view');
	}

}

/* End of file Site.php */
/* Location: ./application/modules/site/controllers/site.php */