<?php


class Database
{
	//проверяет есть подключение или нет
	public $isConn;

	//сохраняет в себе все детали самого подключения
	protected $datab;

	//подключение к БД
	public function __construct ($username = "root", $password = "", $host = "localhost", $dbname = "test_site", $options = [])
	{
		$this->isConn = TRUE;
		try {
			$this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
			$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	//разъединение подключение от БД
	public function Desconnect ()
	{
		$this->datab = NULL;
		$this->isConn = FALSE;
	}
	//получение одной записи с БД
	public function getRow ($query, $params = [])
	{
		//посылаем запрос к БД
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	//получение несколько записей из БД (одна или больше)
	public function getRows ($query, $params = [])
	{
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	//новая запись в БД
	public function insertRow ($query, $params = [])
	{
		try {
			$stmt = $this->datab->prepare($query);
			$stmt->execute($params);
			return TRUE;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	//Обновление инф. в БД
	public function updateRow ($query, $params = [])
	{
		$this->insertRow($query, $params);
	}
	//удаление инф. из БД
	public function deleteRow ($query, $params = [])
	{
		$this->insertRow($query, $params);
	}
}














































