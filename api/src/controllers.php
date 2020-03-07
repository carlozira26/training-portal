<?php

$container['UsersController'] = function($container){
  return new \Controllers\UsersController($container);
};
?>
