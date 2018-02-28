<?php

class Controller extends Auth {

  public function view($file, $data = NULL, $msg = NULL){
    $auth = new Auth();
    $msg  = (object) $msg;
    if(isset($data)) foreach ($data as $key => $value) $$key = $value;
    
    function url($url){ return $GLOBALS['home'].$url; }

    require_once __DIR__.'/../../resource/views/'.$file.'.php';
  }

  public function model($file = null){
    if(isset($file)){
      require_once __DIR__.'/../Models/'.$file.'.php';
      return new $file();
    } else {
      require_once __DIR__.'/../Core/Model.php';
      return new Model();
    }
  }

  public function redirect($file){
  	header("Location:".$GLOBALS['home'].$file);
  	exit;
  }

}
