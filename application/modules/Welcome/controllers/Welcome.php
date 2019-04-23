<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {
	function __construct() {
	        parent::__construct();
	        $this->load->library('form_validation');
	    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		// $this->load->view('index');
    
    $url=explode('/', $_SERVER['SCRIPT_NAME']);
    print_r($url);
    if(in_array('index.php',$url)){
      echo "index page ";
    }
		$this->load->view('welcome_message');
// 		$ch = curl_init();
//     $clientId = "AUpng5jEKMTP-KLcPPavaS7unlQfvhKI4u-ak2sN4NkJvWUPBCRLcipP7g45B6_U4OWFdVt4EZOOtniG";
//     $secret = "ENRXp-CT68xhoNXyO3jwKjnwFtg2CJ8yf-CzMr-v5ryNHImOhl2qPPNCE1avAIDrTC-vpGuhf38y9icQ";

//     curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
//     curl_setopt($ch, CURLOPT_HEADER, false);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_SSLVERSION , 6); 
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
//     curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

//     $result = curl_exec($ch);

//     if(empty($result))die("Error: No response.");
//     else
//     {
//         $json = json_decode($result, TRUE);
//     }



//     curl_close($ch); 
//     print_r( $json );

//     $ch2 = curl_init();
//     $token = $json['access_token'];
//     $data = '{
//   "sender_batch_header": {
//     "sender_batch_id": "Payouts_2018_100007",
//     "email_subject": "bishnu99bca.facilitator@gmail.com",
//     "email_message": "You have received a payout! Thanks for using our service!"
//   },
//   "items": [
//     {
//       "recipient_type": "EMAIL",
//       "amount": {
//         "value": "9.87",
//         "currency": "USD"
//       },
//       "note": "Thanks for your patronage!",
//       "sender_item_id": "201403140001",
//       "receiver": "ksaffer-facilitator@opena.com"
//     },
//       "note": "Thanks for your patronage!",
//       "sender_item_id": "201403140003",
//       "receiver": "G83JXTJ5EHCQ2"
//     }
//   ]
// }'; 


//     //curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment");
//     curl_setopt($ch2, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payouts");
//     curl_setopt($ch2, CURLOPT_VERBOSE, 1);
//     curl_setopt($ch2, CURLOPT_HEADER, 0);
//     curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
//     curl_setopt($ch2, CURLOPT_HTTPHEADER , array("Content-Type: application/json", "Authorization: Bearer ".$token ));
//     curl_setopt($ch2, CURLOPT_POST, 1);
//     curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch2, CURLOPT_POSTFIELDS, $data);

//     $result = curl_exec($ch2);
//     $json = json_decode($result, TRUE); 
//     print_r($json);
//     curl_close($ch2);
	}

  public function sso(){
    $this->load->view('sso');
  }



}
