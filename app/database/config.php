<?php
//[DEFINE]
//[DATABASE]
define('DB_HOST', 'localhost');
define('DB_NAME', 'aethe166_logcat');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
//[BASE URL]
define('BASE_URL', 'http://127.0.0.1');
//[WEB TITLE]
define('TITLE', 'LunarEcho');
//[UNIT]
define('UNIT_1', 'FDPS-RDPS');
define('UNIT_2', 'AMSS-ADPS');
define('UNIT_3', 'SURVEILLANCE');
define('UNIT_4', 'NAVIGATION');
define('UNIT_5', 'RADIO-KOMUNIKASI');
define('UNIT_6', 'SSJJ');
define('UNIT_7', 'LISTRIK');
define('UNIT_8', 'BANGUNAN');
define('UNIT_9', 'DATA-KERUSAKAN');

//[DATABASE CONFIG]
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Error Reporting - > 0
error_reporting(0);

//Open Connection MySQL
function open_connection()
{
	mysqli_select_db(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD), DB_NAME);
}
//Close Connection MySQL
function close_connection()
{
	mysqli_close(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD));
}

//Error Reporting - > 1
error_reporting(1);