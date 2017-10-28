<?php
	class database{

		private $instance;
		private $set;
		private $sql;
		private $query;

		public function __construct(){
			$this->set = new configuration();
			$this->instance = @new mysqli($this->set->db['HOST'], $this->set->db['USER'], $this->set->db['PASS'], $this->set->db['NAME']);
			//if($this->instance->connect_error) throw new Exception("_ERROR: Database not connected!");
		}

		/*
			Query Method
			This method used for sql query formater
		*/
		public function getAllWhere($table, $where, $param = ""){
			if(is_array($where)){
				$this->sql = "SELECT *FROM ". $table. " WHERE ";
				$i = 0;
				foreach($where as $key => $value){
					$i++;
					$this->sql .= $key. " = '". $value. "'";
					if($i < count($where)) $this->sql .= " AND ";
				}
				if(!empty($param)) $this->sql .= $param;
				return $this->exec();
			}else throw new Exception("_ERROR: function argument!");
		}

		public function getAll($table, $param = ""){
			$this->sql = "SELECT *FROM ". $table;
			if(!empty($param)) $this->sql .= $param;
			return $this->exec();
		}



		/*
			Query Execution Method
			This method used for creating executable query
		*/
		public function exec(){
			$this->query = mysqli_query($this->instance, $this->sql);
		}

		public function to_array(){
			$data = [];
			while($res = mysqli_fetch_array($this->query)){
				array_push($data, $res);
			}
			return $data;
		}

	}
