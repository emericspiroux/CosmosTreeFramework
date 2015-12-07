<?php
	include_once "config/database.php";
	/**
	*  CF_model link all model
	*/
	class CF_model
	{
		private $db;

		function __construct()
		{
			global $DB_DSN, $DB_USER, $DB_PASSWORD;
			try {
				$this->db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true));
			}catch(PDOException $e){
				echo 'Connection failed: ' . $e->getMessage();
    			exit;
			}
		}

		protected function insert($table, $array){
			if (!($req = $this->createInsert($table, $array)))
				return (false);
			$sth = $this->db->prepare($req);
			try{
				$pArray = $this->prepareArray($array);
				$sth->execute($pArray);
				return (true);
			}catch (Exception $e)
			{
				echo "Insert query : ".$e->getmessage().PHP_EOL;
				return (false);
			}
		}

		protected function update($table, $arraySet, $arrayWhere){
			if (!($req = $this->createUpdate($table, $arraySet, $arrayWhere)))
				return (false);
			$sth = $this->db->prepare($req);
			try{
				$pArray = $this->prepareArray($arraySet);
				$pWArray = $this->prepareArray($arrayWhere);
				$mArray = array_merge($pArray, $pWArray);
				$sth->execute($mArray);
				return (true);
			}catch (Exception $e)
			{
				echo "Insert query : ".$e->getmessage().PHP_EOL;
				return (false);
			}
		}

		private function createUpdate($table, $array, $arrayWhere){
			$req = "UPDATE ".$table." SET ";
			if (!($argc = count($array)))
				return (false);
			$i = 1;
			foreach ($array as $key => $value) {
				$req .= $key." = :".$key;
				if ($i < $argc)
					$req .= " AND ";
				else
					$req .= " WHERE ";
				$i++;
			}

			$i = 1;
			foreach ($arrayWhere as $key => $value) {
				$req .= $key." = :".$key;
				if ($i < $argc)
					$req .= " AND ";
				$i++;
			}
			return ($req);
		}

		private function createInsert($table, $array){
			$req = "INSERT INTO ".$table." (";
			if (!($argc = count($array)))
				return (false);
			$i = 1;
			foreach ($array as $key => $value) {
				$req .= $key;
				if ($i < $argc)
					$req .= ", ";
				else
					$req .= ") VALUE (";
				$i++;
			}

			$i = 1;
			foreach ($array as $key => $value) {
				$req .= ":".$key;
				if ($i < $argc)
					$req .= ", ";
				else
					$req .= ")";
				$i++;
			}
			return ($req);
		}

		protected function delete($table, $array){
			if (!($req = $this->createDelete($table, $array)))
				return (false);
			try{
				$sth = $this->db->prepare($req);
				$pArray = $this->prepareArray($array);
				$sth->execute($pArray);
				return (true);
			}catch (Exception $e)
			{
				echo "Delete query : ".$e->getmessage().PHP_EOL;
				return (false);
			}
		}

		private function createDelete($table, $array){
			$req = "DELETE FROM ".$table." WHERE ";
			if (!($argc = count($array)))
				return (false);
			$i = 1;
			foreach ($array as $key => $value) {
				$req .= $key."=".":".$key;
				if ($i < $argc)
					$req .= " AND ";
				$i++;
			}
			return ($req);
		}

		protected function doQuery($req /*, ...*/){
			$argc = func_num_args();
			$argv = func_get_args();
			$data = array();
			for ($i=1; $i < $argc; $i++) {
				$data[] = $argv[$i];
			}
			try{
				$sth = $this->db->prepare($req);
				$sth->execute($data);
				return ($sth->fetchAll(PDO::FETCH_ASSOC));
			}catch (Exception $e)
			{
				echo "Query : ".$e->getmessage().PHP_EOL;
				return (false);
			}
		}

		private function prepareArray($array)
		{
			if (!is_array($array))
				throw new Exception('Nothing to prepare query, array is empty.');
			$transed = array();
			foreach ($array as $key => $value) {
				$transed[":".$key] = $value;
			}
			return ($transed);
		}

	}

