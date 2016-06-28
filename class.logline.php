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
		$this->key = urlencode($key);
		$this->endpoint = "http://localhost:3000/api/v1/";
	}

	function log($flag, $message) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$flag = urlencode($flag);
		$message = urlencode($message);
		$data = http_build_query(array(
			"flag" => $flag,
			"msg" => $message,
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
		return $this->log("info", $message);
	}
	function warning($message) {
		return $this->log("info", $message);
	}
	function fatal($message) {
		return $this->log("info", $message);
	}
}
?>