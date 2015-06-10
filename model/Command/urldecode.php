<?
	$_cfg_['cmd']['urldecode'] = function ($msg) {
		if ($msg == "") {
			return "!urldecode <string>";
		}

		return urldecode($msg);
	};