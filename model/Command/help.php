<?
	$_cfg_['cmd']['help'] = function ($msg) {
		global $_cfg_;
		$cmds = [];

		foreach ($_cfg_['cmd'] as $key => $val) {
			$cmds[] = $key;
		}

		return "사용 가능한 명령어: " . implode(", ", $cmds);
	};