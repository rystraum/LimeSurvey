<?php $sitename = Yii::app()->getConfig("sitename"); ?>
<?php $adminlang = Yii::app()->session['adminlang']; ?>
<?php getLanguageRTL(Yii::app()->session["adminlang"]) ? $languageRTL = " dir=\"rtl\" " : $languageRTL = "" ?>
<?php Yii::app()->getClientScript()->reset(); ?>
<!DOCTYPE html>
<html lang="<?php echo $adminlang; ?>"<?php echo $languageRTL;?>>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">  
  <link rel="shortcut icon" href="<?php echo Yii::app()->getConfig('adminstyleurl');?>favicon.png">
  <title><?php echo $sitename; ?></title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getConfig('adminstyleurl');?>bootstrap.css" />

  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getConfig('adminstyleurl');?>navbar-static-top.css" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!-- Layout file in themes/bootstrap/views/layout/admin.php -->
  <!-- Start of super/adminmenu.php -->
  <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo $sitename; ?></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="<?php echo $this->createUrl("/admin/survey/sa/index"); ?>">Home</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forms <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo $this->createUrl("admin/survey/sa/index"); ?>">
                  <?php $this->lang->eT("Forms list"); ?>
                </a>
              </li>
              <?php if(Permission::model()->hasGlobalPermission('surveys','create')): ?>
                <li>
                  <a href="<?php echo $this->createUrl('admin/survey/sa/newsurvey'); ?>">
                    <?php $this->lang->eT("Create, import, or copy a form");?>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo $this->createUrl("admin/user/sa/index"); ?>">
                  <?php $this->lang->eT("Manage form administrators");?>
                </a>
              </li>
              <?php if(Permission::model()->hasGlobalPermission('usergroups','read')): ?>
                <li>
                  <a href="<?php echo $this->createUrl('admin/usergroups/sa/index'); ?>">
                    <?php $this->lang->eT("Create/edit user groups");?>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php if(Permission::model()->hasGlobalPermission('settings','read')): ?>
                <li>
                  <a href="<?php echo $this->createUrl("admin/checkintegrity"); ?>">
                    <?php $this->lang->eT("Check Data Integrity") ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(Permission::model()->hasGlobalPermission('superadmin','read')): ?>
                <?php if (in_array(Yii::app()->db->getDriverName(), array('mysql', 'mysqli')) || Yii::app()->getConfig('demoMode') == true): ?>
                  <li>
                    <a href="<?php echo $this->createUrl("admin/dumpdb"); ?>" >
                      <?php $this->lang->eT("Backup Entire Database");?>
                    </a>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="#" alt='<?php $this->lang->eT("The database export is only available for MySQL databases. For other database types please use the according backup mechanism to create a database dump."); ?>'>Backup Disabled.</a>
                  </li>
                <?php endif; ?>
              <?php endif; ?>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other settings <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php if(Permission::model()->hasGlobalPermission('settings','read')): ?>
                <li><a href="<?php echo $this->createUrl("admin/globalsettings"); ?>">Global Settings</a></li>
              <?php endif; ?>
              
              <?php if(Permission::model()->hasGlobalPermission('participantpanel','read')): ?>
                <li class="divider"></li>
                <li class="dropdown-header">Participants</li>
                <li>
                  <a href="<?php echo $this->createUrl("admin/participants/sa/index"); ?>" >
                    <?php $this->lang->eT("Central participant database/panel");?>
                  </a>
                </li>
              <?php endif; ?>

              <?php if(Permission::model()->hasGlobalPermission('labelsets','read')): ?>
                <li class="divider"></li>
                <li class="dropdown-header">Labels</li>
                <li>
                  <a href="<?php echo $this->createUrl("admin/labels/sa/view"); ?>" >
                    <?php $this->lang->eT("Edit label sets");?>
                  </a>
                </li>
              <?php endif; ?>

              <?php if(Permission::model()->hasGlobalPermission('templates','read')): ?>
                <li class="divider"></li>
                <li class="dropdown-header">Template</li>
                <li>
                  <a href="<?php echo $this->createUrl("admin/templates/sa/view"); ?>" >
                    <?php $this->lang->eT("Template Editor");?>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if(Yii::app()->session['loginID']): ?>
          <li>
            <a href="<?php echo $this->createUrl("/admin/user/sa/personalsettings"); ?>">
              <?php $this->lang->eT("Logged in as:");?>
              <strong>
                <?php echo Yii::app()->session['user'];?>
                <span class="glyphicon glyphicon-edit" alt="<?php $this->lang->eT("Edit your personal preferences");?>"></span>
              </strong>
            </a></li>
          <?php endif; ?>
          <li>
            <a href="<?php echo $this->createUrl("admin/authentication/sa/logout"); ?>" >
              <?php $this->lang->eT("Logout");?>
            </a>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="container" id="main_container">
    <div class="row" id="super_row">
      <?php if( isset($this->menu_bars) && !empty($this->menu_bars) ): ?>
        <div class="col-md-3">
          <?php if( isset($this->menu_bars['survey_bar']) ): ?>
            <?php echo $this->layout_data['survey_bar']; ?>
          <?php endif; ?>
        </div>
        <div class="col-md-9">
          <?php echo $content ?>
        </div>
      <?php else: ?>
        <div class="col-md-12">
          <?php echo $content ?>
        </div>
      <?php endif; ?>
    </div> <!-- #super_row -->
  </div> <!-- #main_container -->
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script type="text/javascript" src="<?php echo Yii::app()->getConfig('generalscripts');?>jquery/jquery.js"></script> -->
  <script type="text/javascript" src="<?php echo Yii::app()->getConfig('adminstyleurl');?>jquery.1.10.2.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->getConfig('adminstyleurl');?>jquery.workarounds.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->getConfig('adminstyleurl');?>bootstrap.js"></script>
  <?php
    if(!empty($js_admin_includes)) {
      foreach ($js_admin_includes as $jsinclude) {
        echo '<script type="text/javascript" src="' . $jsinclude . '"></script>';
      }
    }
    if(!empty($css_admin_includes)) {
      foreach ($css_admin_includes as $cssinclude) {
        echo '<link rel="stylesheet" type="text/css" media="all" href="' . $cssinclude . '" />';
      }
    }
  ?>
</body>
</html>