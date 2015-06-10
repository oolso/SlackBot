<?
	$_cfg_['cmd']['alpha'] = function ($msg) {
		$arr = explode(' ', $msg);

		if (count($arr) < 2) {
			return "!alpha <hex> <percent>";
		}

		$hex     = $arr[1];
		$percent = $arr[2];
		$value   = (int) (hexdec($hex) * $percent / 100);
		return "0x" . strtoupper($hex) . "(" . hexdec($hex) . ") * " . $percent . "% = 0x" . strtoupper(dechex($value)) . "(" . $value . ")";
	};