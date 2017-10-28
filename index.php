<?php
	session_start();
	define("BASE_DIR", __DIR__);
	define("DS", DIRECTORY_SEPARATOR);

	function loading_class($file){
		if(file_exists("app/controller/". $file)){
			require_once("app/controller/". $file);
			$class = str_replace(".php", '', $file);
			$method = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : 'index';
			
			$obj = new $class();
			if(method_exists($obj, $method)){
				call_user_func(array($obj, $method));
			}else throw new Exception("_ERROR: method not found!");
		}else throw new Exception("_ERROR: file or class not found!");
	}

	try{
		include("config.php");
		spl_autoload_register(function ($class){
			include_once("class". DS. $class. ".php");
		});

		$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : 'main';
		$file = $page. ".php";

		loading_class($file);
	}catch(Exception $e){
		echo "WEB". $e->getMessage();
	}
	
