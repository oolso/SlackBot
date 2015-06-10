<?
	function include_glob($pattern) {
		global $_cfg_;
		foreach (glob($pattern) as $file) { // remember the { and } are necessary!
			error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
			include $file;
		}
	}

	function isPrefix($str) {
		global $_cfg_;
		return (bool) in_array($str, $_cfg_['prefix']);
	}

	function isCommand($cmd) {
		global $_cfg_;
		return (bool) $_cfg_['cmd'][$cmd];
	}

	function isBot($userId) {
		global $_cfg_;
		return (bool) in_array($userId, $_cfg_['bot']);
	}