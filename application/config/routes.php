<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * LimeSurvey
 * Copyright (C) 2007-2011 The LimeSurvey Project Team / Carsten Schmitz
 * All rights reserved.
 * License: GNU/GPL License v2 or later, see LICENSE.php
 * LimeSurvey is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 *
 */


//Compatibility with classic modrewrite
$route['<_sid:\d+>/lang-<_lang:\w+[-\w]+>/tk-<_token:\w+>/*'] = "survey/index/sid/<_sid>/lang/<_lang>/token/<_token>"; //This one must be first
$route['<_sid:\d+>/lang-<_lang:\w+[-\w]+>/*'] = "survey/index/sid/<_sid>/lang/<_lang>";
$route['<_sid:\d+>/tk-<_token:\w+>/*'] = "survey/index/sid/<_sid>/token/<_token>";
$route['<_sid:\d+>/*'] = "survey/index/sid/<_sid>";

$route['llous/index'] = "llous";

//Admin Routes
$route['admin/index'] = "admin";
$route['admin/check_url.json'] = "survey/custom_url_check";
$route['admin/<action:\w+>/sa/<sa:\w+>/*'] = 'admin/<action>/sa/<sa>';
$route['admin/<action:\w+>/<sa:\w+>/*'] = 'admin/<action>/sa/<sa>';

//question
$route['admin/labels/<_action:\w+>'] = "admin/labels/index/<_action>";
$route['admin/labels/<_action:\w+>/<_lid:\d+>'] = "admin/labels/index/<_action>/<_lid>";

//Expression Manager tests
$route['admin/expressions'] = "admin/expressions/index";

//optout
$route['optout/<_sid:\d+>/(:any)/(:any)'] = "optout/index/<_sid>/$2/$3";

$route[] =  array(
  'class' => 'application.components.findSurveyUrlRule',
  'connectionID' => 'db',
);
$route['<_controller:\w+>/<_action:\w+>'] = '<_controller>/<_action>';
return $route;