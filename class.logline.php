<?php
/**
 * LogLine - PHP LogLine client class
 * PHP Version 5
 * @link https://github.com/developius/logline-php/ PHP
 * @author Finnian Anderson (developius) <get@finnian.io>
 * @copyright 2016 Finnian Anderson
 * @license https://opensource.org/licenses/MIT MIT License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */
class LogLine {
	function __construct($key) {
		$this->key = $this->clean($key);
		$this->endpoint = "http://localhost:3000/api/v1/";
	}

	function clean($text) {
		return str_replace("+", "%20", urlencode($text));
	}

	function log($flag, $message) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$data = http_build_query(array(
			"flag" => $this->clean($flag),
			"msg" => $this->clean($message),
			"key" => $this->key
			));

		curl_setopt($curl, CURLOPT_URL, $this->endpoint."msg?".$data);

		$result = json_decode(curl_exec($curl));

		curl_close($curl);

		if (!$result->success) {
			throw new Exception("LogLine returned an error: ".$result->msg);
		}

		return $result;
	}

	function info($message) {
		return $this->log("info", $message);
	}
	function success($message) {
		return $this->log("success", $message);
	}
	function warning($message) {
		return $this->log("warning", $message);
	}
	function fatal($message) {
		return $this->log("fatal", $message);
	}
}
?>
