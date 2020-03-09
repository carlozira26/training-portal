<?php
	$container['UsersController'] = function($container){
	  return new \Controllers\UsersController($container);
	};
	$container['LookupController'] = function($container){
	  return new \Controllers\LookupController($container);
	};
	$container['FormController'] = function($container){
	  return new \Controllers\FormController($container);
	};
?>
