<?php
class DbUtil{
	public static $loginUser = "amh4wk"; 
	public static $loginPass = "123456";
	public static $host = "cs4750.cs.virginia.edu"; // DB Host
	public static $schema = "amh4wk_project"; // DB Schema aka database name

	public static function loginConnection(){
			$db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);

			if($db->connect_errno){
					echo("Could not connect to db");
					$db->close();
					exit();
			}

			return $db;
	}

}
?>
