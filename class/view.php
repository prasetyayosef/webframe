<?php
	class view{

		private $data;
		private $head;
		private $foot;

		public $conf;

		public function __construct(){
			$this->data = [];
			$this->conf = new configuration();
		}


		
		/*
			Page Format
			These methods used for creating html structure
			and sending data into page
		*/
		public function header($head = ""){
			$file = BASE_DIR. DS. "app". DS. "res". DS. "view_header.php";
			require_once($file);
			$this->head = $head;
		}

		public function load($file, $data = ''){
			$loc_view = BASE_DIR. DS. "app". DS. "view". DS. $file;
			if(file_exists($loc_view) || !empty($data)){
				require_once($loc_view);
				$this->data = $data;
			}else throw new Exception("_ERROR: file ".  $loc_view. " didnt exists!");
		}

		public function footer(){
			$footer = BASE_DIR. DS. "app". DS. "res". DS. "view_footer.php";
			require_once($footer);
		}
	
	}
