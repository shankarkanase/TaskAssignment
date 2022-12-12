<?php

/****************************************
Class Name - DbConnect
Use - To Perform db related opertions
Developer - Shankar Kanase	
 *****************************************/

class DbConnect
{
	protected $table;
	protected $parameters;
	protected $id;
	protected $cond;
	protected $dbh;
	protected $query;


	/**************************************************
	Function Name - connect
	Parameters - 1. host
				 2. user
				 3. pass
				 4. dbName
				 5. dbDriver
	Purpose - To create a sql connection
	Developer - Shankar Kanase	
	 ***************************************************/

	public function connect($host, $user, $pass, $dbName, $dbDriver)
	{
		try {
			if ($dbDriver == 'MSSql') {
				$conn = new PDO("sqlsrv:Server=$host;Database=$dbName;", "$user", "$pass");
				return $conn;
			} else if ($dbDriver == 'MySql') {
				$conn = new PDO("mysql:host=$host;dbname=$dbName;", "$user", "$pass");
				return $conn;
			}
		} catch (PDOException $Exception) {
			echo "Error Occured While Connecting To Database:" . $Exception->getMessage() . " Error Code -" . $Exception->getCode();
			exit;
		}
	}

	/**************************************************
	Function Name - dbh
	Parameters -
	Purpose - To assign db instance to variable
	Developer - Shankar Kanase	
	 ***************************************************/
	public function dbh($conn)
	{
		$this->dbh = $conn;
	}

	/**************************************************
	Function Name - query
	Parameters -$query
	Purpose - To assign querystring to variable
	Developer - Shankar Kanase		
	 ***************************************************/
	public function query($query)
	{
		$this->query = $query;
	}

	/**************************************************
	Function Name - table
	Parameters -$table
	Purpose - To assign table name to variable
	Developer - Shankar Kanase		
	 ***************************************************/
	public function table($table)
	{
		$this->table = $table;
	}

	/**************************************************
	Function Name - cond
	Parameters -$cond
	Purpose - To apply condition to query
	Developer - Shankar Kanase		
	 ***************************************************/
	public function cond($cond)
	{
		$this->cond = $cond;
	}

	/**************************************************
	Function Name - parameters
	Parameters -$parameters
	Purpose - To assign parameters array to variable
	Developer - Shankar Kanase		
	 ***************************************************/
	public function parameters($parameters)
	{
		$this->parameters = $parameters;
	}

	/**************************************************
	Function Name - select
	Parameters -
	Purpose - To select records from table
	Developer - Shankar Kanase		
	 ***************************************************/
	public function select($parameters)
	{
		$result = $this->dbh->prepare($this->query);
		$result->execute($parameters);

		$result = $result->fetchAll(PDO::FETCH_ASSOC);

		return array_shift($result);
	}

	/**************************************************
	Function Name - select
	Parameters -
	Purpose - To select records from table
	Developer - RShankar Kanase		
	 ***************************************************/
	public function selectALL($parameters)
	{
		$result = $this->dbh->prepare($this->query);
		if (isset($parameters) && $parameters != '') {
			$result->execute($parameters);
		} else {
			$result->execute();
		}
		$result = $result->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	/**************************************************
	Function Name - insert
	Parameters -
	Purpose - To insert data into table
	Developer - Shankar Kanase		
	 ***************************************************/
	public function insert()
	{
		$query = "";
		$columnNames = "";
		$columnVal = "";
		foreach ($this->parameters as $key => $value) {
			$columnNames .= $key . ",";
			$columnVal .= ":" . $key . ",";
		}
		$columnName = substr($columnNames, 0, -1);
		$columnVal = substr($columnVal, 0, -1);
		$query = "insert into " . $this->table . " (" . $columnName . ") values (" . $columnVal . ")";
		//echo $query;

		$result = $this->dbh->prepare($query);

		foreach ($this->parameters as $key => $value) {
			$result->bindValue(':' . $key, $value);
		}
		$result->execute();
		//print_r($result->errorinfo());
		return $this->dbh->lastInsertId();
	}

	/**************************************************
	Function Name - update
	Parameters - 
	Purpose - To update data from table
	Developer -Shankar Kanase		
	 ***************************************************/
	public function update()
	{
		$query = "";
		$columnVal = "";
		foreach ($this->parameters as $key => $value) {
			$columnVal .= $key . "=:" . $key . ",";
		}
		$columnVal = substr($columnVal, 0, -1);

		$query = "UPDATE " . $this->table . " set $columnVal where  " . $this->cond;
		echo $query;
		$result = $this->dbh->prepare($query);

		foreach ($this->parameters as $key => $value) {
			$result->bindValue(':' . $key, $value);
		}
		$result->execute();
		print_r($result->errorinfo());
		return $result;
	}
}
