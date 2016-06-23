<?php

namespace ApiConsumer;

use Illuminate\Support\Collection;

class Consumer {
  use Traits\Util;
	private $token;
  private $uriApi;
  private $requestHeaders;
	public function __construct($uriApi, $token) {
		$this->uriApi = $uriApi;
		$this->token = $token;
    $this->requestHeaders[] = 'token: '.$this->token;
	}
	public function get($url = null) {
		if (empty($url)) {
			throw new \Exception('la url no puede ser vacia');
		}
    $req = $this->uriApi.$url;
    $ch = curl_init($req);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->requestHeaders);
    $response = curl_exec($ch);
    curl_close($ch);
    if(!$response) {
      return false;
    } else {
    	return $this->responseJsonDecode($response);
    }
	}
  public function post($url, $data = array()) {
    $rows = collect($data)->count();
    if ((int)$rows === 0) {
      throw new \Exception('el post no contiene datos a enviar');
    }
    $req = $this->uriApi.$url;
    $ch = curl_init($req);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->requestHeaders);
    $response = curl_exec($ch);
    curl_close($ch);
    if(!$response) 
    {
      return false;
    }
    else
    {
      return $this->responseJsonDecode($response);
    }
  }
}