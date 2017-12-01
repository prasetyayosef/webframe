<?php
	class model{

		public $query;

		public function __construct(){
			$this->query = new database();
		}

		public function load($class){
			$loc_file = BASE_DIR. DS. "app". DS. "model". DS. $class. ".php";
			if(file_exists($loc_file)){
				require_once($loc_file);
				$this->$class = new $class();
				return $this->$class;
			}else throw new Exception("_ERROR: model $class didnt exists!");
		}

		public function getAll($param = ""){
			return $this->query->getAll($this->table, $param);
		}

		public function getWhere($col, $where, $param = ""){
			return $this->query->getAll($this->table, $col, $where, $param);
		}

		public function getAllWhere($where, $params = ""){
			return $this->query->getAllWhere($this->table, $where, $params);
		}
	}

