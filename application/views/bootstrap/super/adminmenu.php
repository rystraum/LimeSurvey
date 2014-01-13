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
                <?php $clang->eT("Forms list"); ?>
              </a>
            </li>
            <?php if(Yii::app()->session['USER_RIGHT_CREATE_SURVEY']): ?>
              <li>
                <a href="<?php echo $this->createUrl('admin/survey/sa/newsurvey'); ?>">
                  <?php $clang->eT("Create, import, or copy a form");?>
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
                <?php $clang->eT("Manage form administrators");?>
              </a>
            </li>
            <?php if(Yii::app()->session['USER_RIGHT_CREATE_USER']): ?>
              <li>
                <a href="<?php echo $this->createUrl('admin/usergroups/sa/index'); ?>">
                  <?php $clang->eT("Create/edit user groups");?>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <?php if(Yii::app()->session['USER_RIGHT_CONFIGURATOR'] == 1): ?>
              <li>
                <a href="<?php echo $this->createUrl("admin/checkintegrity"); ?>">
                  <?php $clang->eT("Check Data Integrity") ?>
                </a>
              </li>
            <?php endif; ?>
            <?php if(Yii::app()->session['USER_RIGHT_SUPERADMIN'] == 1): ?>
              <?php if (in_array(Yii::app()->db->getDriverName(), array('mysql', 'mysqli')) || Yii::app()->getConfig('demoMode') == true): ?>
                <li>
                  <a href="<?php echo $this->createUrl("admin/dumpdb"); ?>" >
                    <?php $clang->eT("Backup Entire Database");?>
                  </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="#" alt='<?php $clang->eT("The database export is only available for MySQL databases. For other database types please use the according backup mechanism to create a database dump."); ?>'>Backup Disabled.</a>
                </li>
              <?php endif; ?>
            <?php endif; ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other settings <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <?php if(Yii::app()->session['USER_RIGHT_CONFIGURATOR'] == 1): ?>
              <li><a href="<?php echo $this->createUrl("admin/globalsettings"); ?>">Global Settings</a></li>
            <?php endif; ?>
            
            <?php if(Yii::app()->session['USER_RIGHT_PARTICIPANT_PANEL'] == 1): ?>
              <li class="divider"></li>
              <li class="dropdown-header">Participants</li>
              <li>
                <a href="<?php echo $this->createUrl("admin/participants/sa/index"); ?>" >
                  <?php $clang->eT("Central participant database/panel");?>
                </a>
              </li>
            <?php endif; ?>

            <?php if(Yii::app()->session['USER_RIGHT_MANAGE_LABEL'] == 1): ?>
              <li class="divider"></li>
              <li class="dropdown-header">Labels</li>
              <li>
                <a href="<?php echo $this->createUrl("admin/labels/sa/view"); ?>" >
                  <?php $clang->eT("Edit label sets");?>
                </a>
              </li>
            <?php endif; ?>

            <?php if(Yii::app()->session['USER_RIGHT_MANAGE_TEMPLATE'] == 1): ?>
              <li class="divider"></li>
              <li class="dropdown-header">Template</li>
              <li>
                <a href="<?php echo $this->createUrl("admin/templates/sa/view"); ?>" >
                  <?php $clang->eT("Template Editor");?>
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
            <?php $clang->eT("Logged in as:");?>
            <strong>
              <?php echo Yii::app()->session['user'];?>
              <span class="glyphicon glyphicon-edit" alt="<?php $clang->eT("Edit your personal preferences");?>"></span>
            </strong>
          </a></li>
        <?php endif; ?>
        <li>
          <a href="<?php echo $this->createUrl("admin/authentication/sa/logout"); ?>" >
            <?php $clang->eT("Logout");?>
          </a>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
<div class="container" id="main_container">
  <div class="row" id="super_row">