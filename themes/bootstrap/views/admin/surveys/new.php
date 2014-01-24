<?php
  extract($data);
  Yii::app()->loadHelper('admin/htmleditor');
  PrepareEditorScript(false, $this);
?>
<?php
    if ($action == "editsurveysettings") {
      $sURL = "admin/database/index/updatesurveysettings";
    } else {
      $sURL = "admin/survey/sa/insert";
    }
?>
<h1><?php $clang->eT("Create, import, or copy survey"); ?></h1>
<ul class="nav nav-tabs">
  <li><a href='#general' data-toggle='tab'><?php $clang->eT("General"); ?></a></li>
  <li><a href='#presentation' data-toggle='tab'><?php $clang->eT("Presentation & navigation"); ?></a></li>
  <li><a href='#publication' data-toggle='tab'><?php $clang->eT("Publication & access control"); ?></a></li>
  <li><a href='#notification' data-toggle='tab'><?php $clang->eT("Notification & data management"); ?></a></li>
  <li><a href='#tokens' data-toggle='tab'><?php $clang->eT("Tokens"); ?></a></li>
  <?php if ($action == "newsurvey"): ?>
    <li><a href='#import'><?php $clang->eT("Import"); ?></a></li>
    <li><a href='#copy'><?php $clang->eT("Copy"); ?></a></li>
  <?php elseif ($action == "editsurveysettings"): ?>
    <li><a href='#panelintegration'><?php $clang->eT("Panel integration"); ?></a></li>
    <li><a href='#resources'><?php $clang->eT("Resources"); ?></a></li>
  <?php endif; ?>
</ul>

<?php echo CHtml::form(array($sURL), 'post', array('id'=>'addnewsurvey', 'name'=>'addnewsurvey', 'class'=>'form30')); ?>
  <div class="tab-content">
    <?php
      $this->renderPartial('surveys/partials/tab_general',$data);
      $this->renderPartial('surveys/partials/tab_presentation',$data);
      $this->renderPartial('/admin/survey/subview/tabPublication_view',$data);
      $this->renderPartial('/admin/survey/subview/tabNotification_view',$data);
      $this->renderPartial('/admin/survey/subview/tabTokens_view',$data);
    ?>
  </div>

  <input type='hidden' id='surveysettingsaction' name='action' value='insertsurvey' />
</form>

<?php
  $this->renderPartial('/admin/survey/subview/tabImport_view',$data);
  $this->renderPartial('/admin/survey/subview/tabCopy_view',$data);
?>
</div>

<p>
  <button id='btnSave' class="btn btn-primary" onclick="if (isEmpty(document.getElementById('surveyls_title'), '<?php $clang->eT("Error: You have to enter a title for this survey.", 'js');?>')) { document.getElementById('addnewsurvey').submit();}" class='standardbtn' >
    <?php $clang->eT("Save");?>
  </button>
</p>

