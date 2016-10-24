<?
	include "include.php";

	try {
		if (!isset($_cfg_) || count($_cfg_) == 0) throw new Exception("config.php not found");

		$bot       = new SlackBot($_cfg_['slack']['token'], $_cfg_['slack']['nickname'], $_cfg_['slack']['imageUrl']);
		$channelId = $_REQUEST['channel_id'];
		$text      = $_REQUEST['text'];
		$userName  = $_REQUEST['user_name'];
		$userId    = $_REQUEST['user_id'];

		if (isBot($userId)) return;

		if (isPrefix($text[0])) {
			$arr    = explode(" ", $text);
			$cmd    = strtolower(substr(array_shift($arr), 1));
			$msg    = implode(" ", $arr);
			$result = "";

			if (isCommand($cmd)) {
				$result = $_cfg_['cmd'][$cmd]($msg);
			}

			if ($result != "") {
				$bot->message($channelId, $result);
			}
		}
	} catch (Exception $e) {
		if ($fp = fopen(__ROOT__ . "/tmp/error.txt", "at")) {
			fputs($fp, date('Y-m-d H:i:s', time()) . "\t[Error] " . $e->getMessage() . "\n");
			fclose($fp);
		}
	}
?>