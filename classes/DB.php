<?php
/**
 * DB Class
 */


class DB
{
	private static $pdo;

	private static function connection()
	{
		$dsn = 'mysql:host=localhost; dbname=users_db';
		$db_user = 'root';
		$db_pass = '';

		if (!isset(self::$pdo)) {
			try {
				self::$pdo = new PDO($dsn, $db_user, $db_pass);
			} catch (PDOException $e) {
				echo($e->getMessage());
			}
		}

		return self::$pdo;
	}

	public static function prepare($sql)
	{
		return self::connection()->prepare($sql);
	}
}

?>