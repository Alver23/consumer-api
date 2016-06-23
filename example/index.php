<?php
require_once __DIR__.'/../vendor/autoload.php';

use ApiConsumer\Consumer;
use Illuminate\Support\Collection;

$api = 'http://www.example.com/';
$url = 'offices';
$token = 'mi token';
$curl = new Consumer($api, $token);
$res = $curl->get($url);
if ($res !== false) {
	// Devuelve una coleccion
	$collection = collect($res);
	// Devuelve un objeto
	$data = $res;
}

$urlPost = 'save';
$dataPost = array('first_name' => 'Alver');
$resPost = $curl->post($urlPost, $dataPost);

if ($resPost !== false) {
	// Devuelve una coleccion
	$collection = collect($resPost);
	// Devuelve un objeto
	$data = $resPost;
}