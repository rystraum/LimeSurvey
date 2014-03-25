<?php
	extract($data);
	Yii::app()->loadHelper('admin/htmleditor');
	PrepareEditorScript(false, $this);
?>
<script type="text/javascript">
    standardtemplaterooturl='<?php echo Yii::app()->getConfig('standardtemplaterooturl');?>';
    templaterooturl='<?php echo Yii::app()->getConfig('usertemplaterooturl');?>';
</script>

<div class='header ui-widget-header'><?php $clang->eT("Create, import, or copy survey"); ?></div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
        <?php $this->renderPartial('/admin/survey/partial/new_survey', $data) ?>
    </div> <!-- .span12 -->
  </div> <!-- .row-fluid -->
</div> <!-- .container-fluid -->

<?php
    // $this->renderPartial('/admin/survey/subview/tabImport_view',$data);
    // $this->renderPartial('/admin/survey/subview/tabCopy_view',$data);
?>