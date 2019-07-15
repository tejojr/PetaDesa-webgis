<?php
class Database {
	public $isConn;
	protected $conn;
	public function __construct($username = "root", $password = "", $host = "localhost", $dbname = "maps") {
		$this->isConn = TRUE;
		try {
			$this->conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}

	}
	public function Close() {
		$this->conn = NULL;
		$this->isConn = FALSE;
	}
	public function redirect($url) {
		header("Location: $url");
	}
	public function inlogin() {
		if (isset($_SESSION['uid'])) {
			return true;
		}
	}
	public function select($query, $params = []) {
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute($params);
			return $stmt->fetch();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	public function selectall($query, $params = []) {
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	public function cud($query, $params = []) {
		try {
			$stmt = $this->conn->prepare($query);
			$stmt->execute($params);
			return TRUE;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}

}

?>
