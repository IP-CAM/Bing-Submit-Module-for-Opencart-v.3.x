<?php
class ModelToolBingSubmit extends Model {
		public function bingPost($api, $data){
		$url = 'https://ssl.bing.com/webmaster/api.svc/json/SubmitUrl?apikey='.$api;
	   $curl = curl_init();
	   
		curl_setopt($curl, CURLOPT_POST, 1);
		if ($data) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		} else {
			$url = sprintf("%s?%s", $url, http_build_query($data));
		}	

	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json',
	   ));
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	   //additional options
	   curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
	   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	   // EXECUTE:
	   $result = curl_exec($curl);
	   if(!$result){die("Connection Failure");}
	   curl_close($curl);
	   return $result;
	}
}
