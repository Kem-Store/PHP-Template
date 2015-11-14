<?php
// Author: Kenanek Thongkam
error_reporting(E_ALL); // 
date_default_timezone_set('Asia/Bangkok');

class Ini
{
	public static function SettingArray($path)
	{
		$tmpConfig = NULL;
		$loadConfig = parse_ini_file($path, true);
		foreach($loadConfig as $isGroupConfig)
		{
			foreach($isGroupConfig as $name=>$value)
			{
				$tmpConfig[$name] = $value;
			}
		}
		return $tmpConfig;
	}	
}

class Component
{
	public static function load()
	{
		$objs = array();
		$dir = dirname(".")."/component";
		$d = dir($dir);
		while (false !== ($entry = $d->read())) {
			if($entry!='.' && $entry!='..') {
		   		$path = $dir.'/'.$entry.'/index.php';
		   		if (file_exists($path)) {
		   			$modify = date("F d Y H:i:s", filemtime($path));
		   			array_push($objs, array('com'=> $entry, 'path'=> $path, 'update'=> $modify));
		   		}
		   	}
		}
		$d->close();
		return $objs;
	}	
	public static function Info($text)
	{
		$tmpString = '<center><div class="alert-info">';
		$tmpString .= $text.'</div></center>';
		return $tmpString;
	}	
}


class ThaiDate
{
	public static function TimeStamp($isHour, $isMinute, $isDay, $isMonth, $isYear)
	{
		return mktime($isHour, $isMinute, 0, $isMonth, $isDay, $isYear);
	}
	
	public static function Full($timestamp)
	{
		$fullMonth = array(0,_January, _February, _March, _April, _Mays, _June, _July, _August, _September, _October, _November, _December);
		
		$isDay = date('d',$timestamp);
		$isMonth = date('n',$timestamp);
		$isYear = date('Y',$timestamp);
		
		return _DATE_DAY.$isDay.' '.$fullMonth[$isMonth]._DATE_PS.($isYear+543);
	}	
	
	public static function Mid($timestamp)
	{
		$fullMonth = array(0,_January, _February, _March, _April, _Mays, _June, _July, _August, _September, _October, _November, _December);
		$isDay = date('d',$timestamp);
		$isMonth = date('n',$timestamp);
		$isYear = date('Y',$timestamp);
		
		return $isDay.' '.$fullMonth[$isMonth].' '.($isYear+543);
	}
}
?>
