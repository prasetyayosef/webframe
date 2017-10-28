<?php
	class main extends controller{

		public function __construct(){
			parent::__construct();
			$this->test = $this->model->load('test');
		}

		public function index(){
			//$data = $this->test->getChart();
			$this->view->header("header");
			$this->view->load("index.php");
			$this->view->footer();
			if(isset($_FILES["image"])){
				$this->conf->upload("image");
			}
		}

	}	
