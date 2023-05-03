<?php

namespace App;

use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Session;
use Exception;


//use Illuminate\Database\Eloquent\SoftDeletes;

class Funcoes
{
	public static function acionarCurl(array $data) 
	{
		extract($data);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $endpoint,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $acao,
			CURLOPT_POSTFIELDS => $dadosEnvio,
			CURLOPT_HTTPHEADER => $header,
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response);

	}
	   
}