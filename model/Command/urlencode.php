<?
	$_cfg_['cmd']['urlencode'] = function ($msg) {
		if ($msg == "") {
			return "!urlencode <string>";
		}

		return urlencode($msg);
	};