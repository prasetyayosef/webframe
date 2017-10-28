<?php
	class test extends model{
		public $table = 'chart';

		public function __construct(){
			parent::__construct();	
		}

		public function getChart(){
			$this->getAllwhere(array("id_chart" => 1));
			return $this->query->to_array();
		}

		public function getCharts(){
			$this->getAll();
		}
	}
