<?
	$_cfg_['cmd']['sa'] = function ($msg) {
		$time    = time() - 16 * 3600;
		$message = "현재 샌프란시스코는 " . date('Y년 m월 d일 H시 i분s초', $time) . ' 입니다';
		return $message;
	};