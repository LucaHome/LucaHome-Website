<?php

define ( 'LUCAHOMEPORT', 6677 );

$user = Get ( 'user' );
$password = Get ( 'password' );
$login = "$user:$password";

$action = Get ( 'action' );

switch ($action) {
	
	/* ----------------------- All --------------------- */
	case 'reloadall':
		echo Send ( "$login:ALL:RELOAD" );
		break;
	
	/* ----------------- Access Control ---------------- */
	case 'activatealarm' :
		echo Send ( "$login:ACCESS:ACTIVATE:ALARM" );
		break;
	case 'checkcode' :
		$code = Get ( 'code' );
		if ($code != '') {
			echo Send ( "$login:ACCESS:CHECK:CODE:$code" );
		} else {
			echo "Error 200:Parameter not found for access control";
		}
		break;
	case 'playalarm' :
		echo Send ( "$login:ACCESS:PLAY:ALARM" );
		break;
	case 'stopalarm' :
		echo Send ( "$login:ACCESS:STOP:ALARM" );
		break;
	
	/* ------------------- Birthday -------------------- */
	case 'getbirthdays' :
		echo Send ( "$login:BIRTHDAY:GET:ALL" );
		break;
	case 'addbirthday' :
		$id = Get ( 'id' );
		$name = Get ( 'name' );
		$day = Get ( 'day' );
		$month = Get ( 'month' );
		$year = Get ( 'year' );
		if ($id != '' && $name != '' && $day != '' && $month != '' && $year != '') {
			echo Send ( "$login:BIRTHDAY:ADD:$id:$name:$day:$month:$year" );
		} else {
			echo "Error 35:Parameter not found for birthday";
		}
		break;
	case 'updatebirthday' :
		$id = Get ( 'id' );
		$name = Get ( 'name' );
		$day = Get ( 'day' );
		$month = Get ( 'month' );
		$year = Get ( 'year' );
		if ($id != '' && $name != '' && $day != '' && $month != '' && $year != '') {
			echo Send ( "$login:BIRTHDAY:UPDATE:$id:$name:$day:$month:$year" );
		} else {
			echo "Error 35:Parameter not found for birthday";
		}
		break;
	case 'deletebirthday' :
		$id = Get ( 'id' );
		if ($id != '') {
			echo Send ( "$login:BIRTHDAY:DELETE:$id" );
		} else {
			echo "Error 35:Parameter not found for birthday";
		}
		break;
	case 'setcontroltaskbirthday' :
		$state = Get ( 'state' );
		if ($state != '') {
			echo Send ( "$login:BIRTHDAY:SETCONTROLTASK:$state" );
		} else {
			echo "Error 35:Parameter not found for birthday";
		}
		break;
	
	/* -------------------- Camera -------------------- */
	case 'startmotion' :
		echo Send ( "$login:CAMERA:START:MOTION" );
		break;
	case 'stopmotion' :
		echo Send ( "$login:CAMERA:STOP:MOTION" );
		break;
	case 'getmotiondata' :
		echo Send ( "$login:CAMERA:GET:MOTION:DATA" );
		break;
	case 'getmotionstate' :
		echo Send ( "$login:CAMERA:GET:MOTION:STATE" );
		break;
	case 'getmotioncontrol' :
		echo Send ( "$login:CAMERA:GET:MOTION:CONTROL" );
		break;
	case 'getcameraurl' :
		echo Send ( "$login:REMOTE:GET:URL:CAMERA" );
		break;
	case 'setcontroltaskcamera' :
		$state = Get ( 'state' );
		if ($state != '') {
			echo Send ( "$login:CAMERA:SETCONTROLTASK:$state" );
		} else {
			echo "Error 173:Parameter not found for camera";
		}
		break;
	
	/* -------------------- Changes -------------------- */
	case 'getchanges' :
		echo Send ( "$login:CHANGE:GET:WEBSITE" );
		break;
	case 'getchangesrest' :
		echo Send ( "$login:CHANGE:GET:REST" );
		break;
	
	/* --------------------- Coins --------------------- */
	case 'getcoinsall' :
		echo Send ( "$login:COINS:GET:ALL" );
		break;
	case 'getcoinsuser' :
		echo Send ( "$login:COINS:GET:FOR_USER" );
		break;
	case 'addcoin' :
		$id = Get ( 'id' );
		$username = Get ( 'username' );
		$type = Get ( 'type' );
		$amount = Get ( 'amount' );
		if ($id != '' && $username != '' && $type != '' && $amount != '') {
			echo Send ( "$login:COINS:ADD:$id:$username:$type:$amount" );
		} else {
			echo "Error 206:Parameter not found for coin";
		}
		break;
	case 'updatecoin' :
		$id = Get ( 'id' );
		$username = Get ( 'username' );
		$type = Get ( 'type' );
		$amount = Get ( 'amount' );
		if ($id != '' && $username != '' && $type != '' && $amount != '') {
			echo Send ( "$login:COINS:UPDATE:$id:$username:$type:$amount" );
		} else {
			echo "Error 206:Parameter not found for coin";
		}
		break;
	case 'deletecoin' :
		$id = Get ( 'id' );
		if ($id != '') {
			echo Send ( "$login:COIN:DELETE:$id" );
		} else {
			echo "Error 206:Parameter not found for coin";
		}
		break;
	
	/* ---------------------- Gpio --------------------- */
	case 'getgpios' :
		echo Send ( "$login:REMOTE:GET:GPIO:ALL" );
		break;
	case 'addgpio' :
		$name = Get ( 'name' );
		$gpio = Get ( 'gpio' );
		if ($name != '' && $gpio != '') {
			echo Send ( "$login:REMOTE:ADD:GPIO:$name:$gpio:0" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'deletegpio' :
		$name = Get ( 'name' );
		if ($name != '') {
			echo Send ( "$login:REMOTE:DELETE:GPIO:$name" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'setgpio' :
		$gpio = Get ( 'gpio' );
		$state = Get ( 'state' );
		if ($gpio != '' && $state != '') {
			echo Send ( "$login:REMOTE:SET:GPIO:$gpio:$state" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'activateAllGpios' :
		echo Send ( "$login:REMOTE:SET:GPIO:ALL:1" );
		break;
	case 'deactivateAllGpios' :
		echo Send ( "$login:REMOTE:SET:GPIO:ALL:0" );
		break;
	
	/* ------------------ Informations ------------------ */
	case 'getinformations' :
		echo Send ( "$login:INFORMATION:GET:WEBSITE" );
		break;
	case 'getinformationsrest' :
		echo Send ( "$login:INFORMATION:GET:REST" );
		break;
	
	/* ------------------- MapContent ------------------- */
	case 'getmapcontents' :
		echo Send ( "$login:MAPCONTENT:GET:ALL" );
		break;
	case 'addmapcontent' :
		$id = Get ( 'id' );
		$position = Get ( 'position' );
		$type = Get ( 'type' );
		$schedules = Get ( 'schedules' );
		$sockets = Get ( 'sockets' );
		$temperatureArea = Get ( 'temperatureArea' );
		$visibility = Get ( 'visibility' );
		if ($id != '' && $position != '' && $type != '' && $schedules != '' && $sockets != '' && $temperatureArea != '' && $visibility != '') {
			echo Send ( "$login:MAPCONTENT:ADD:$id:$position:$type:$schedules:$sockets:$temperatureArea:$visibility" );
		} else {
			echo "Error 145:Parameter not found for mapcontent";
		}
		break;
	case 'updatemapcontent' :
		$id = Get ( 'id' );
		$position = Get ( 'position' );
		$type = Get ( 'type' );
		$schedules = Get ( 'schedules' );
		$sockets = Get ( 'sockets' );
		$temperatureArea = Get ( 'temperatureArea' );
		$visibility = Get ( 'visibility' );
		if ($id != '' && $position != '' && $type != '' && $schedules != '' && $sockets != '' && $temperatureArea != '' && $visibility != '') {
			echo Send ( "$login:MAPCONTENT:UPDATE:$id:$position:$type:$schedules:$sockets:$temperatureArea:$visibility" );
		} else {
			echo "Error 145:Parameter not found for mapcontent";
		}
		break;
	case 'deletemapcontent' :
		$id = Get ( 'id' );
		if ($id != '') {
			echo Send ( "$login:MAPCONTENT:DELETE:$id" );
		} else {
			echo "Error 145:Parameter not found for mapcontent";
		}
		break;
	
	/* ------------------- Menu ------------------- */
	case 'getmenu' :
		echo Send ( "$login:MENU:GET:MENU" );
		break;
	case 'updatemenu' :
		$weekday = Get ( 'weekday' );
		$day = Get ( 'day' );
		$month = Get ( 'month' );
		$year = Get ( 'year' );
		$title = Get ( 'title' );
		$description = Get ( 'description' );
		if ($weekday != '' && $day != '' && $month != '' && $year != '' && $title != '' && $description != '') {
			echo Send ( "$login:MENU:UPDATE:MENU:$weekday:$day:$month:$year:$title:$description" );
		} else {
			echo "Error 164:Parameter not found for menu";
		}
		break;
	case 'clearmenu' :
		$weekday = Get ( 'weekday' );
		if ($weekday != '') {
			echo Send ( "$login:MENU:CLEAR:$weekday" );
		} else {
			echo "Error 164:Parameter not found for menu";
		}
		break;
	case 'getlistedmenu' :
		echo Send ( "$login:MENU:GET:LISTEDMENU" );
		break;
	case 'addlistedmenu' :
		$id = Get ( 'id' );
		$description = Get ( 'description' );
		$rating = Get ( 'rating' );
		if ($id!= '' && $description!= '' && $rating!= '') {
			echo Send ( "$login:MENU:ADD:LISTEDMENU:$id:$description:$rating:0" );
		} else {
			echo "Error 164:Parameter not found for menu";
		}
		break;
	case 'updatelistedmenu' :
		$id = Get ( 'id' );
		$description = Get ( 'description' );
		$rating = Get ( 'rating' );
		$lastsuggestion = Get ( 'lastsuggestion' );
		if ($id!= '' && $description!= '' && $rating!= '' && $lastsuggestion!= '') {
			echo Send ( "$login:MENU:UPDATE:LISTEDMENU:$id:$description:$rating:$lastsuggestion" );
		} else {
			echo "Error 164:Parameter not found for menu";
		}
		break;
	case 'deletelistedmenu' :
		$id = Get ( 'id' );
		if ($id!= '') {
			echo Send ( "$login:MENU:DELETE:LISTEDMENU:$id" );
		} else {
			echo "Error 164:Parameter not found for menu";
		}
		break;
	
	/* --------------------- Movie --------------------- */
	case 'getmovies' :
		$movieCount = Send ( "$login:MOVIE:GET:COUNT" );
		if (strpos ( $movieCount, 'Error' ) !== false) {
			echo $movieCount;
		} else {
			$movies = "";
			$startIndex = 0;
			$endIndex = 25;
			while ( $startIndex < $movieCount - 1 ) {
				$response = Send ( "$login:MOVIE:GET:INDEX:$startIndex:$endIndex" );
				if (strpos ( $response, 'Error' ) !== false) {
					echo $response;
					break;
				} else {
					$movies .= $response;
					$startIndex += 25;
					$endIndex += 25;
				}
			}
			echo $movies;
		}
		break;
	case 'updatemovie' :
		$title = Get ( 'title' );
		$genre = Get ( 'genre' );
		$description = Get ( 'description' );
		$rating = Get ( 'rating' );
		$watched = Get ( 'watched' );
		$sockets = Get ( 'sockets' );
		if ($title != '') {
			echo Send ( "$login:MOVIE:UPDATE:$title:$genre:$description:$rating:$watched:$sockets" );
		} else {
			echo "Error 400:Parameter not found for movie";
		}
		break;
	case 'loadmovies' :
			echo Send ( "$login:MOVIE:LOAD:ALL" );
		break;
	
	/* --------------------- Remote -------------------- */
	case 'getraspberry' :
		echo Send ( "$login:REMOTE:GET:RASPBERRY" );
		break;
	case 'getarea' :
		echo Send ( "$login:REMOTE:GET:AREA" );
		break;
	
	/* -------------------- Schedule ------------------- */
	case 'getschedules' :
		echo Send ( "$login:REMOTE:GET:SCHEDULE:ALL" );
		break;
	case 'addschedule' :
		$name = Get ( 'name' );
		$socket = Get ( 'socket' );
		$gpio = Get ( 'gpio' );
		$weekday = Get ( 'weekday' );
		$hour = Get ( 'hour' );
		$minute = Get ( 'minute' );
		$onoff = Get ( 'onoff' );
		$isTimer = Get ( 'isTimer' );
		$playSound = Get ( 'playSound' );
		$playRaspberry = Get ( 'playRaspberry' );
		if ($name != '' && ($socket != '' || $gpio != '') && $weekday != '' && $hour != '' && $minute != '' && $onoff != '' && $isTimer != '' && $playSound != '' && $playRaspberry != '') {
			echo Send ( "$login:REMOTE:ADD:SCHEDULE:$name:$socket:$gpio:$weekday:$hour:$minute:$onoff:$isTimer:$playSound:$playRaspberry:1" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'updateschedule' :
		$name = Get ( 'name' );
		$socket = Get ( 'socket' );
		$gpio = Get ( 'gpio' );
		$weekday = Get ( 'weekday' );
		$hour = Get ( 'hour' );
		$minute = Get ( 'minute' );
		$onoff = Get ( 'onoff' );
		$isTimer = Get ( 'isTimer' );
		$playSound = Get ( 'playSound' );
		$playRaspberry = Get ( 'playRaspberry' );
		$isActive = Get ( 'isactive' );
		if ($name != '' && ($socket != '' || $gpio != '') && $weekday != '' && $hour != '' && $minute != '' && $onoff != '' && $isTimer != '' && $playSound != '' && $playRaspberry != '' && $isActive != '') {
			echo Send ( "$login:REMOTE:UPDATE:SCHEDULE:$name:$socket:$gpio:$weekday:$hour:$minute:$onoff:$isTimer:$playSound:$playRaspberry:$isActive" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'deleteschedule' :
		$schedule = Get ( 'schedule' );
		if ($schedule != '') {
			echo Send ( "$login:REMOTE:DELETE:SCHEDULE:$schedule" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'setschedule' :
		$schedule = Get ( 'schedule' );
		$state = Get ( 'state' );
		if ($schedule != '' && $state != '') {
			echo Send ( "$login:REMOTE:SET:SCHEDULE:$schedule:$state" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'activateAllSchedules' :
		echo Send ( "$login:REMOTE:SET:SCHEDULE:ALL:1" );
		break;
	case 'deactivateAllSchedules' :
		echo Send ( "$login:REMOTE:SET:SCHEDULE:ALL:0" );
		break;
	
	/* ----------------- ShoppingList ------------------ */
	case 'getshoppinglist' :
		echo Send ( "$login:SHOPPINGLIST:GET:ALL" );
		break;
	case 'addshoppingentry' :
		$id = Get ( 'id' );
		$name = Get ( 'name' );
		$group = Get ( 'group' );
		$quantity = Get ( 'quantity' );
		if ($id != '' && $name != '' && $group != '' && $quantity != '') {
			echo Send ( "$login:SHOPPINGLIST:ADD:$id:$name:$group:$quantity" );
		} else {
			echo "Error 155:Parameter not found for shopping entry";
		}
		break;
	case 'updateshoppingentry' :
		$id = Get ( 'id' );
		$name = Get ( 'name' );
		$group = Get ( 'group' );
		$quantity = Get ( 'quantity' );
		if ($id != '' && $name != '' && $group != '' && $quantity != '') {
			echo Send ( "$login:SHOPPINGLIST:UPDATE:$id:$name:$group:$quantity" );
		} else {
			echo "Error 155:Parameter not found for shopping entry";
		}
		break;
	case 'deleteshoppingentry' :
		$id = Get ( 'id' );
		if ($id != '') {
			echo Send ( "$login:SHOPPINGLIST:DELETE:$id" );
		} else {
			echo "Error 155:Parameter not found for shopping entry";
		}
		break;
	
	/* ---------------- Socket ---------------- */
	case 'getsockets' :
		echo Send ( "$login:REMOTE:GET:SOCKET:ALL" );
		break;
	case 'addsocket' :
		$name = Get ( 'name' );
		$area = Get ( 'area' );
		$code = Get ( 'code' );
		if ($name != '' && $area != '' && $code != '') {
			echo Send ( "$login:REMOTE:ADD:SOCKET:$name:$area:$code:0" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'updatesocket' :
		$name = Get ( 'name' );
		$area = Get ( 'area' );
		$code = Get ( 'code' );
		$isactivated = Get ( 'isactivated' );
		if ($name != '' && $area != '' && $code != '' && $isactivated != '') {
			echo Send ( "$login:REMOTE:UPDATE:SOCKET:$name:$area:$code:$isactivated" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'deletesocket' :
		$socket = Get ( 'socket' );
		if ($socket != '') {
			echo Send ( "$login:REMOTE:DELETE:SOCKET:$socket" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'setsocket' :
		$socket = Get ( 'socket' );
		$state = Get ( 'state' );
		if ($socket != '' && $state != '') {
			echo Send ( "$login:REMOTE:SET:SOCKET:$socket:$state" );
		} else {
			echo "Error 121:Parameter not found for remote";
		}
		break;
	case 'activateAllSockets' :
		echo Send ( "$login:REMOTE:SET:SOCKET:ALL:1" );
		break;
	case 'deactivateAllSockets' :
		echo Send ( "$login:REMOTE:SET:SOCKET:ALL:0" );
		break;
	
	/* --------------------- Sound --------------------- */
	case 'startplaying' :
		$song = Get ( 'song' );
		if ($song != '') {
			echo Send ( "$login:SOUND:PLAY:$song" );
		} else {
			echo "Error 94:Parameter not found for sound";
		}
		break;
	case 'stopplaying' :
		echo Send ( "$login:SOUND:STOP:ALL" );
		break;
	case 'increasevolume' :
		echo Send ( "$login:SOUND:SET:VOLUME:INCREASE" );
		break;
	case 'decreasevolume' :
		echo Send ( "$login:SOUND:SET:VOLUME:DECREASE" );
		break;
	case 'getvolume' :
		echo Send ( "$login:SOUND:GET:VOLUME" );
		break;
	case 'getsounds' :
		echo Send ( "$login:SOUND:GET:FILES" );
		break;
	case 'issoundplaying' :
		echo Send ( "$login:SOUND:GET:PLAYING" );
		break;
	case 'getplayingfile' :
		echo Send ( "$login:SOUND:GET:PLAYINGFILE" );
		break;
	
	/* ------------------ System ------------------ */
	case 'systemreboot' :
		echo Send ( "$login:SYSTEM:SYSTEM:REBOOT" );
		break;
	case 'systemshutdown' :
		echo Send ( "$login:SYSTEM:SYSTEM:SHUTDOWN" );
		break;
	
	/* ------------------ Temperature ------------------ */
	case 'getcurrenttemperature' :
		echo Send ( "$login:TEMPERATURE:GET:WEBSITE" );
		break;
	case 'getcurrenttemperaturerest' :
		echo Send ( "$login:TEMPERATURE:GET:REST" );
		break;
	case 'gettemperaturegraphurl' :
		echo Send ( "$login:REMOTE:GET:URL:TEMPERATURE" );
		break;
	
	/* ---------------------- User --------------------- */
	case 'validateuser' :
		echo Send ( "$login:USER:VALIDATE:NOW" );
		break;
	
	/* ---------------------- Watchdog -------------------- */
	case 'ping' :
		echo Send ( "$login:WATCHDOG:AVAILABILITY:CHECK" );
		break;
	case 'watchdogcount' :
		$count = Get ( 'count' );
		if ($count != '') {
			echo Send ( "$login:WATCHDOG:COUNT:CHECK:$count" );
		} else {
			echo "Error 192:Parameter not found for watchdog";
		}
		break;
		echo Send ( "$login:WATCHDOG:AVAILABILITY:CHECK" );
		break;

	/* --------------------- Default ------------------- */
	default :
		var2console ( "Warning: " );
		var2console ( $action );
		break;
}

/* ===================== Functions ===================== */
function Get($val) {
	if (isset ( $_GET [$val] )){
		return $_GET [$val];
	}
}
function StartsWith($Haystack, $Needle) {
	return strpos ( $Haystack, $Needle ) === 0;
}
function GetValues($data, $type) {
	$lines = explode ( ';', $data );
	
	$values = array ();
	for($i = 0; $i < count ( $lines ); $i ++) {
		if (StartsWith ( $lines [$i], $type )) {
			$values [] = explode ( ':', $lines [$i] );
		}
	}
	return $values;
}
function Send($data) {
	$socket = fsockopen ( 'udp://127.0.0.1', LUCAHOMEPORT, $errno, $errstr, 10 );
	$out = "";
	if (! $socket) {
		var2console ( "SocketError" );
		echo "$errstr ($errno)";
		exit ();
	} else {
		fwrite ( $socket, "$data" );
		$out = fread ( $socket, 65536 );
		fclose ( $socket );
	}
	return $out;
}

/* ===================================================== */
/* ====================== GETTER ======================= */
/* ===================================================== */

/* ================== Get Informations ================= */
function GetInformations() {
	return Send ( "Website:234524:INFORMATION:GET:WEBSITE" );
}

/* ===================== Get Changes =================== */
function GetChanges() {
	return Send ( "Website:234524:CHANGE:GET:WEBSITE" );
}

/* ======================= Get Area ==================== */
function GetArea() {
	return Send ( "Website:234524:REMOTE:GET:AREA" );
}

/* =================== Get Temperature ================= */
function GetTemperature() {
	return Send ( "Website:234524:TEMPERATURE:GET:WEBSITE" );
}

/* ============== Get Temperature Graph URL ============ */
function GetTemperatureGraphUrl() {
	return Send ( "Website:234524:REMOTE:GET:URL:TEMPERATURE" );
}

/* ============== Get Main URL ============ */
function GetMainUrl() {
	return Send ( "Website:234524:REMOTE:GET:URL:MAIN" );
}

/* ============== Get Camera URL ============ */
function GetCameraUrl() {
	return Send ( "Website:234524:REMOTE:GET:URL:CAMERA" );
}

/* ============== Get MOTION State ============ */
function GetMotionState() {
	$motionState = Send ( "Website:234524:CAMERA:GET:MOTION:STATE" );
	if ($motionState == "STATE:ON") {
		return true;
	} else {
		return false;
	}
}

/* ===================== Get MapContent =================== */
function GetMapContent() {
	return Send ( "Website:234524:MAPCONTENT:GET:ALL:WEBSITE" );
}

/* ===================== Get Menu =================== */
function GetMenu() {
	return Send ( "Website:234524:MENU:GET:MENU:WEBSITE" );
}

/* ===================== Get ShoppingList =================== */
function GetShoppingList() {
	return Send ( "Website:234524:SHOPPINGLIST:GET:ALL:WEBSITE" );
}

/* ===================== Get BirthdayList =================== */
function GetBirthdayList() {
	return Send ( "Website:234524:BIRTHDAY:GET:ALL:WEBSITE" );
}

/* ============== Get MovieList ============ */
function GetMovieList() {
	$movieCount = Send ( "Website:234524:MOVIE:GET:COUNT" );
	$movies = "";

	if (strpos ( $movieCount, 'Error' ) !== false) {
		return $movies;
	} else {
		$startIndex = 0;
		$endIndex = 25;
		while ( $startIndex < $movieCount - 1 ) {
			$response = Send ( "Website:234524:MOVIE:GET:INDEX:REDUCED:$startIndex:$endIndex" );
			if (strpos ( $response, 'Error' ) !== false) {
				return "";
			} else {
				$movies .= $response;
				$startIndex += 25;
				$endIndex += 25;
			}
		}
	}

	return $movies;
}

/* ===================================================== */
/* ====================== PARSER ======================= */
/* ===================================================== */

function ParseInformations($data) {
	$values = GetValues ( $data, 'information:' );
	$informations = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$informations [] = array (
				'key' => trim ( $values [$i] [1] ),
				'value' => trim ( $values [$i] [2] ) 
		);
	}
	return $informations;
}

function ParseChanges($data) {
	$values = GetValues ( $data, 'change:' );
	$changes = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$changes [] = array (
				'type' => trim ( $values [$i] [1] ),
				'hour' => trim ( $values [$i] [2] ),
				'minute' => trim ( $values [$i] [3] ),
				'day' => trim ( $values [$i] [4] ),
				'month' => trim ( $values [$i] [5] ),
				'year' => trim ( $values [$i] [6] ),
				'user' => trim ( $values [$i] [7] ) 
		);
	}
	return $changes;
}

function ParseMapContent($data) {
	$values = GetValues ( $data, 'mapcontent:' );
	$mapContent = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$positionString = trim ( $values [$i] [2] );
		$position [] = explode ( '|', $positionString );

		$scheduleString = trim ( $values [$i] [4] );
		$schedules [] = explode ( '|', $scheduleString );

		$socketString = trim ( $values [$i] [5] );
		$sockets [] = explode ( '|', $socketString );

		$mapContent [] = array (
				'id' => trim ( $values [$i] [1] ),
				'position' => $position,
				'type' => trim ( $values [$i] [3] ),
				'schedules' => $schedules,
				'sockets' => $sockets,
				'temperatureArea' => trim ( $values [$i] [6] ),
				'visibility' => trim ( $values [$i] [7] )
		);
	}
	return $mapContent;
}

function ParseMenu($data) {
	$values = GetValues ( $data, 'menu:' );
	$menus = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$menus [] = array (
				'weekday' => trim ( $values [$i] [1] ),
				'day' => trim ( $values [$i] [2] ),
				'month' => trim ( $values [$i] [3] ),
				'year' => trim ( $values [$i] [4] ),
				'title' => trim ( $values [$i] [5] ),
				'description' => trim ( $values [$i] [6] )
		);
	}
	return $menus;
}

function ParseShoppingList($data) {
	$values = GetValues ( $data, 'shopping_entry:' );
	$shoppingList = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$shoppingList [] = array (
				'name' => trim ( $values [$i] [1] ),
				'group' => trim ( $values [$i] [2] ),
				'quantity' => trim ( $values [$i] [3] )
		);
	}
	return $shoppingList;
}

function ParseBirthdayList($data) {
	$values = GetValues ( $data, 'birthday:' );
	$birthdayList = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$birthdayList [] = array (
				'id' => trim ( $values [$i] [1] ),
				'name' => trim ( $values [$i] [2] ),
				'day' => trim ( $values [$i] [3] ),
				'month' => trim ( $values [$i] [4] ),
				'year' => trim ( $values [$i] [5] )
		);
	}
	return $birthdayList;
}

function ParseMovieList($data) {
	$values = GetValues ( $data, 'movie:' );
	$movieList = array ();
	for($i = 0; $i < count ( $values ); $i ++) {
		$movieList [] = array (
				'title' => trim ( $values [$i] [1] ),
				'genre' => trim ( $values [$i] [2] ),
				'description' => trim ( $values [$i] [3] ),
				'rating' => trim ( $values [$i] [4] ),
				'watched' => trim ( $values [$i] [5] )
		);
	}
	return $movieList;
}

/* ===================================================== */
/* ====================== LOGGER ======================= */
/* ===================================================== */

function var2console($var, $name = '', $now = false) {
	if ($var === null)
		$type = 'NULL';
	else if (is_bool ( $var ))
		$type = 'BOOL';
	else if (is_string ( $var ))
		$type = 'STRING[' . strlen ( $var ) . ']';
	else if (is_int ( $var ))
		$type = 'INT';
	else if (is_float ( $var ))
		$type = 'FLOAT';
	else if (is_array ( $var ))
		$type = 'ARRAY[' . count ( $var ) . ']';
	else if (is_object ( $var ))
		$type = 'OBJECT';
	else if (is_resource ( $var ))
		$type = 'RESOURCE';
	else
		$type = '???';
	if (strlen ( $name )) {
		str2console ( "$type $name = " . var_export ( $var, true ) . ';', $now );
	} else {
		str2console ( "$type = " . var_export ( $var, true ) . ';', $now );
	}
}
function str2console($str, $now = false) {
	if ($now) {
		echo "<script type='text/javascript'>\n";
		echo "//<![CDATA[\n";
		echo "console.log(", json_encode ( $str ), ");\n";
		echo "//]]>\n";
		echo "</script>";
	} else {
		register_shutdown_function ( 'str2console', $str, true );
	}
}

?>
