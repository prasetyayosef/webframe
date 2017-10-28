<?php
	class configuration{

		private $conf;
		public $db;
		
		public function __construct(){
			include(BASE_DIR. DS. "config.php");
			$this->db = $_WEB['DB'];
		}

		public function parse($data){
			$res = 1;
			foreach($data as $key => $value){
				if($value == ''){
					$res = 0;
				}
			}
			return $res;
		}

		public function upload($up_name){
			$up_file 	= BASE_DIR. DS. "app". DS. "upload". DS. $_FILES[$up_name]['name'];
			if(move_uploaded_file($_FILES[$up_name]['tmp_name'], $up_file)){
				echo "done!";
			}else echo "error uploading!";
		}

	}
