<?php
/**
 * mdnamegen.php
 * 
 * (c) 2013 nisihunabasi
 * 
 * This script is creating filename for MailDir.
 * 
 * {@link https://github.com/nisihunabasi/mdnamegen.php}
 * @author nisihunabasi {@link http://nisihunabasi.mods.jp/blog/}
 * 
 */
class MDNameGen {
	
	const INFO_FLAG_PASSED 	= "P";
	const INFO_FLAG_REPLIED = "R";
	const INFO_FLAG_SEEN 	= "S";
	const INFO_FLAG_TRASHED = "T";
	const INFO_FLAG_DRAFT 	= "D";
	const INFO_FLAG_FLAGGED = "F";
	
	/**
	 * Creating unique filename for Maildir.
	 * 
	 * @param int $timestamp UNIX Timestamp.
	 * @param String $hostname 
	 * @param String $infoFlag
	 * @return String Filename For Maildir
	 */
	public static function createMDName($timestamp = "", $hostname = "example.jp", $infoFlag = "") {
		$timestamp = ($timestamp == "") ? time() : $timestamp;
		$randomInt = rand(100000, 999999);
		$microtime = MDNameGen::getMicroTime();
		
		$filename = $timestamp . ".R" . $randomInt . "M" . $microtime . "." . $hostname;
		
		return ($infoFlag != "") ? $filename . ":2," . $infoFlag : $filename;
	}
	
	public static function getMicroTime() {
		list($micro, $time) = explode(" ", microtime(false));
		
		return (float)$micro * 1000000;
	}
}

