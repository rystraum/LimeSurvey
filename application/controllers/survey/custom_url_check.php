<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class custom_url_check extends CAction {
  public function run() {
    $url = Yii::app()->request->getQuery('url');
    
    if(empty($url)) { 
      $survey_found = "false";
    } else {
      $survey = Survey::model()->findByAttributes(array('custom_url' => $url));
      $survey_found = ($survey !== NULL) ? 'true' : 'false';
    }

    header('Content-Type: application/json');
    echo '{ "survey_found": ' . $survey_found . ' }';
    die;
  }
}