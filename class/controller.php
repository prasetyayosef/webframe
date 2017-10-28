<?php
	class controller{

		private $db;

		public 	$view;
		public 	$model;
		public 	$conf;

		public function __construct(){
			$this->conf		= new configuration();
			$this->view 	= new view();
			$this->model 	= new model();
			$this->db		= new database();
		}

	}
