<?php
class DataBase{
	private static $handlerDB;

	public static function connect($driver = DB_DRIVER,
		$connectionInfo = CONNECTION_INFO)
	{
		if ($driver==Driver::MYSQL) {
			$handler = new MySql ($connectionInfo);
		}
		else {
			$handler = new Postgres ($connectionInfo);
		}

		self::$handlerDB = $handler;
	}  //fin metodo connect

	public static function query($sql){
		return (self::$handlerDB->querySelect($sql));
	}

	public static function querAction($sql, $values, $keyfield){
		return (self::$handlerDB->queryAction($sql, $values, $keylield));

	}

}  // fin clase DataBase

?>