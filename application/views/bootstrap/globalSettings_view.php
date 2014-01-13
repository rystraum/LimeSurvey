<div class="col-md-12">
  <h1>Global Settings</h1>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class='active'><a data-toggle='tab' href='#overview'><?php $clang->eT("Overview & update"); ?></a></li>
    <li><a data-toggle='tab' href='#general'><?php $clang->eT("General"); ?></a></li>
    <li><a data-toggle='tab' href='#email'><?php $clang->eT("Email settings"); ?></a></li>
    <li><a data-toggle='tab' href='#bounce'><?php $clang->eT("Bounce settings"); ?></a></li>
    <li><a data-toggle='tab' href='#security'><?php $clang->eT("Security"); ?></a></li>
    <li><a data-toggle='tab' href='#presentation'><?php $clang->eT("Presentation"); ?></a></li>
    <li><a data-toggle='tab' href='#language'><?php $clang->eT("Language"); ?></a></li>
    <li><a data-toggle='tab' href='#interfaces'><?php $clang->eT("Interfaces"); ?></a></li>
  </ul>

  <?php echo CHtml::form(array("admin/globalsettings"), 'post', array('class'=>'form form30','id'=>'frmglobalsettings','name'=>'frmglobalsettings'));?>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class='tab-pane active' id='overview'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/overview', $overview); ?>
        </div>
        <div class='tab-pane' id='general'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/general', $general); ?>
        </div>
        <div class='tab-pane' id='email'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/email', $email); ?>
        </div>
        <div class='tab-pane' id='bounce'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/bounce', $bounce); ?>
        </div>
        <div class='tab-pane' id='security'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/security', $security); ?>
        </div>
        <div class='tab-pane' id='presentation'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/presentation', $presentation); ?>
        </div>
        <div class='tab-pane' id='language'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/language', $language); ?>
        </div>
        <div class='tab-pane' id='interfaces'>
          <?php echo $this->renderPartial('/bootstrap/global_settings/interfaces', $interfaces); ?>
        </div>
        <input type='hidden' name='restrictToLanguages' id='restrictToLanguages' value='<?php implode(' ',$restrictToLanguages); ?>'/>
        <input type='hidden' name='action' value='globalsettingssave'/>
    </div>
  </form>

  <input type='button' onclick='$("#frmglobalsettings").submit();' class='btn btn-primary standardbtn' value='<?php $clang->eT("Save settings"); ?>' />
  <?php if (Yii::app()->getConfig("demoMode") == true): ?>
    <p><?php $clang->eT("Note: Demo mode is activated. Marked (*) settings can't be changed."); ?></p>
  <?php endif; ?>
</div>