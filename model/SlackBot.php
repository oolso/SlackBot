<?

	class SlackBot
	{
		static $baseUrl = "https://slack.com/api/";

		/** @var String */
		private $token, $userName, $iconUrl;

		function __construct($token, $userName, $iconUrl = null) {
			$this->token    = $token;
			$this->userName = $userName;
			$this->iconUrl  = $iconUrl;
		}

		private static function buildUrl($method) {
			return self::$baseUrl . $method;
		}

		private function request($method, $param = []) {
			$param['token'] = $this->token;

			$url = self::buildUrl($method);

			$snoopy = new Snoopy();
			$snoopy->submit($url, $param);

			$json = json_decode($snoopy->results);

			$isSuccess = (bool) $json->ok;
			if (!$isSuccess) throw new Exception($json->error);

			return $json;
		}

		function message($channelId, $message) {
			$param = [
				'channel'  => $channelId,
				'text'     => htmlspecialchars($message),
				'username' => $this->userName,
				'icon_url' => $this->iconUrl
			];

			self::request("chat.postMessage", $param);
		}

		function init() {
			self::request("rtm.start");
		}
	}