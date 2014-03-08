<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* FormsGen
* Copyright (C) 2014 Intelimina Systems Inc. / Rystraum Gamonez
* All rights reserved.
* License: GNU/GPL License v2 or later, see LICENSE.php
* FormsGen is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*
* @author Rystraum Gamonez
*/

/**
* LlouController
*
* @package FormsGen
* @author Rystraum Gamonez
* @copyright 2014
* @access public
*/
class LlousController extends LSYii_Controller {  
  protected function _init() {
    parent::_init();
  }

  public function run($action) {
    parent::run($action);
  }

  public function actionIndex() {
    $this->layout = 'main';
    $data = array();
    $data['llous'] = Llou::model()->findAll();
    
    $this->render('index', $data);
  }
}
