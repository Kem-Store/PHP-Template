<?php
class DB
{
	protected $dbh;
	protected $isConfig;
	protected $connected;
	
	public function __construct()
	{
		$this->connected = true;
		$dbConfig = parse_ini_file($_SERVER["DOCUMENT_ROOT"].'/lib/bin/DB.ini', true);
		$dbConfig = $_SERVER['SERVER_PORT'] != 80 ? $dbConfig['localhost'] : $dbConfig['server'];
        $connection = "mysql:host=$dbConfig[host];dbname=$dbConfig[dbname]";

		try {
			$this->dbh = new PDO($connection, $dbConfig['username'], $dbConfig['password'], NULL);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->dbh->exec("SET names utf8");
		} catch(Exception $ex) {
			$this->connected = false;
			throw new Exception($connection);
		}
	}
	
	public function row($sql, $params = array()){
		$item = $this->fetch($sql, $params);
		if(count($item)>0) $item = $item[0];
		return $item;
	}

	public function fetch($sql, $params = array())
	{
		$query = array();
		if($this->connected)
		{
			try {
				$sth = $this->dbh->prepare($sql);
				foreach ($params as $key => $val) {
				    $sth->bindParam($key, $val);
				}
				$sth->execute();
				$query = $sth->fetchAll();
			} catch(Exception $ex) {
				throw $ex;
			}			
		}
		return $query;


		// list($sqlType) = explode(' ',$sqlString);
		// switch(strtolower($sqlType))
		// {
		// 	case 'select':
		// 		$result = array();				
		// 		try {
		// 			$tmpQuery = @mysql_query($sqlString, $this->dbh);
		// 			if(!$tmpQuery)
		// 			{
		// 				throw new Exception('<strong>SQL SELECT:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
		// 			} else {
		// 				while($tmpValue = mysql_fetch_array($tmpQuery))
		// 				{
		// 					$result[] = $tmpValue;
		// 				}
		// 			}
		// 		} catch(Exception $e) {
		// 			echo '<p>'.$e->getMessage().'</p>';
		// 		}
		// 		if(ereg('(limit 1)', strtolower($sqlString)) && isset($result[0]) ) { $result = $result[0]; }
		// 		if(ereg('(count\(\*\))', strtolower($sqlString)) && isset($result[0]) ) { $result = $result[0][0]; }
		// 		return $result;
		// 	break;
		// 	case 'insert':
		// 		try {
		// 			$tmpQuery = @mysql_query($sqlString, $this->dbh);
		// 			if(!$tmpQuery)
		// 			{
		// 				throw new Exception('<strong>SQL INSERT:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
		// 			} else {
		// 				return mysql_insert_id($this->dbh);
		// 			}
		// 		} catch(Exception $e) {
		// 			echo '<p>'.$e->getMessage().'</p>';
		// 			return false;
		// 		}
		// 	break;
		// 	case 'update':
		// 		try {
		// 			$tmpQuery = @mysql_query($sqlString, $this->dbh);
		// 			if(!$tmpQuery)
		// 			{
		// 				throw new Exception('<strong>SQL UPDATE:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
		// 			} else {
		// 				return mysql_affected_rows($this->dbh);
		// 			}
		// 		} catch(Exception $e) {
		// 			echo '<p>'.$e->getMessage().'</p>';
		// 			return false;
		// 		}
		// 	break;
		// 	default:
		// 		try {
		// 			$tmpQuery = @mysql_query($sqlString, $this->dbh);
		// 			if(!$tmpQuery)
		// 			{
		// 				throw new Exception('<strong>SQL Query:</strong> '.mysql_error().'<br/><strong>SEL STRING:</strong> '.$sqlString);
		// 			} else {
		// 				return true;
		// 			}
		// 		} catch(Exception $e) {
		// 			echo '<p>'.$e->getMessage().'</p>';
		// 			return false;
		// 		}
		// 	break;
		// }
	}

	public function __destruct()
	{
		//@mysql_close($this->dbh);
	}
}
?>