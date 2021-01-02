<?php
$serverName = 'DESKTOP-GRRJR2D\SQLEXPRESS';
$connectionInfo = array("Database" =>"php_sql", "UID"=>"sa", "PWD" => "12070023", "CharacterSet" => "UTF-8");
$conn_sis = sqlsrv_connect($serverName, $connectionInfo);

if($conn_sis)
{
	echo "conexion exitosa";
}
else
{
	echo "fallo la conexion";
	die(print_r(sqlsrv_errors(), true));
}