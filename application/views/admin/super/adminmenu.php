<script type="text/javascript">
$(document).ready(function(){
    $("a[href~='"+document.location.pathname+"']").parents('.nav li').addClass('active');
});
</script>

<div class="navbar" id="main-nav">
  <div class="navbar-inner">
    <a class="brand maintitle" href="#"><?php echo Yii::app()->getConfig("sitename") ?></a>
    <ul class="nav">
      <li class="dropdown">
        <a href="<?php echo $this->createUrl("/admin/index") ?>" class="dropdown-toggle" data-toggle="dropdown" data-target="#">
          <?php $clang->eT("Default administration page") ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          <li><a href="<?php echo $this->createUrl("admin/user/sa/index") ?>"><?php $clang->eT("Manage survey administrators") ?></a></li>
          <?php if(Permission::model()->hasGlobalPermission('usergroups','read')): ?>
            <li><a href="<?php echo $this->createUrl("admin/usergroups/sa/index") ?>"><?php $clang->eT("Create/edit user groups")?></a></li>
          <?php endif ?>

          <?php if(Permission::model()->hasGlobalPermission('settings','read')): ?>
            <li class="separator"></li>
            <li><a href="<?php echo $this->createUrl("admin/globalsettings") ?>"><?php $clang->eT("Global settings") ?></a></li>
            <li><a href="<?php echo $this->createUrl("admin/checkintegrity") ?>"><?php $clang->eT("Check Data Integrity") ?></a></li>
          <?php endif ?>

          <?php if(Permission::model()->hasGlobalPermission('superadmin','read')): ?>
            <li>
              <?php if (in_array(Yii::app()->db->getDriverName(), array('mysql', 'mysqli')) || Yii::app()->getConfig('demoMode') == true): ?>
                <a href="<?php echo $this->createUrl("admin/dumpdb") ?>"><?php $clang->eT("Backup Entire Database") ?></a>
              <?php else: ?>
                <a href="#"><?php $clang->eT("The database export is only available for MySQL databases. For other database types please use the according backup mechanism to create a database dump.") ?></a>
              <?php endif ?>
            </li>
          <?php endif ?>

          <?php if(Permission::model()->hasGlobalPermission('labelsets','read')): ?>
            <li><a href="<?php echo $this->createUrl("admin/labels/sa/view") ?>" ><?php $clang->eT("Edit label sets");?></a></li>
          <?php endif ?>

          <?php if(Permission::model()->hasGlobalPermission('templates','read')): ?>
            <li><a href="<?php echo $this->createUrl("admin/templates/sa/view") ?>"><?php $clang->eT("Template Editor") ?></a></li>
          <?php endif ?>

          <?php if(Permission::model()->hasGlobalPermission('participantpanel','read')): ?>
            <li><a href="<?php echo $this->createUrl("admin/participants/sa/index") ?>" ><?php $clang->eT("Central participant database/panel") ?></a></li>
          <?php endif ?>

          <?php if(Permission::model()->hasGlobalPermission('superadmin','read')): ?>
            <li><a href="<?php echo $this->createUrl("plugins/") ?>" ><?php $clang->eT("Plugin manager") ?></a></li>
          <?php endif ?>
        </ul>
      </li>

      <li class="dropdown">
        <a href="<?php echo $this->createUrl("/admin/survey/sa/index") ?>" class="dropdown-toggle" data-toggle="dropdown" data-target="#">
          <?php $clang->eT("Surveys") ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          <li><a href="<?php echo $this->createUrl("admin/survey/sa/index") ?>"><?php $clang->eT("Detailed list of surveys") ?></a></li>

          <?php if (Permission::model()->hasGlobalPermission('surveys','create')): ?>
            <li><a href="<?php echo $this->createUrl("admin/survey/sa/newsurvey") ?>"><?php $clang->eT("Create, import, or copy a survey") ?></a></li>
          <?php endif ?>
        </ul>
      </li>
    </ul>

    <form class="navbar-form pull-left">
      <label for='surveylist'><?php $clang->eT("Surveys:") ?></label>
      <select name='surveylist' onchange="if (this.options[this.selectedIndex].value!='') {window.open('<?php echo $this->createUrl("/admin/survey/sa/view/surveyid/"); ?>/'+this.options[this.selectedIndex].value,'_top')} else {window.open('<?php echo $this->createUrl("/admin/survey/sa/index/");?>','_top')}">
          <?php echo getSurveyList(false, $surveyid) ?>
      </select>
    </form>

    <ul class="nav pull-right">
        <?php if(Yii::app()->session['loginID']): ?>
            <li>
                <a href="<?php echo $this->createUrl("/admin/user/sa/personalsettings"); ?>">
                    <?php $clang->eT("Logged in as:") ?>
                    <?php echo Yii::app()->session['user']?>
                </a>
            </li>
        <?php endif ?>
        <li><a href="<?php echo $this->createUrl("admin/authentication/sa/logout") ?>" ><?php $clang->eT("Logout") ?></a></li>
    </ul>
  </div>
</div>