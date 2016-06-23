<?php

namespace ApiConsumer\Traits;

use Illuminate\Support\Collection;

trait Util {
	public function responseJsonDecode ($data) {
		$res = json_decode($data);
		$rows = collect($res)->count();
		if ((int)$rows === 0) {
			throw new \Exception('la variable recibida esta vacia');
		}
		return $res;
	}
}