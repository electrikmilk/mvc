<?php

// Load composer...
require_once '../vendor/autoload.php';

include_once '../database/DB.php';

use Database\DB;

$e = DB::format();

// Process query...
if ($_GET['query']) {
	if (strpos($_GET['query'], '?')) {
		$query = explode('?', $_GET['query']);
		$route = $query[0];
		// Register $_GET parameters
		if (isset($query[1])) {
			$params = explode("&", $query[1]);
			foreach ($params as $param) {
				$kv = explode("=", $param);
				$key = $kv[0];
				$value = $kv[1];
				$_GET[$key] = $value;
			}
		}
	} else {
		$route = $_GET['query'];
	}
} else {
	$route = '/';
}

require_once '../app/routes.php';