<?php

class findSurveyUrlRule extends CBaseUrlRule {
  public $connectionID = 'db';

  public function createUrl($manager,$route,$params,$ampersand) {
    return false;  // this rule does not apply
  }

  public function parseUrl($manager,$request,$pathInfo,$rawPathInfo) {
    if (preg_match('%(\w+)%', $pathInfo, $matches) === 1) {
      $custom_url = $matches[1];
      $survey = Survey::model()->findByAttributes(array('custom_url' => $custom_url));
      if(!empty($survey)) {
        $_GET['sid'] = $survey->sid;
        return 'survey/index';
      }
    }
    return false;  // this rule does not apply
  }
}