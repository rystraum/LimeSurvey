<h2><?php $this->lang->eT("System overview"); ?></h2>
<p style="display:none;">This file in application/views/bootstrap/global_settings/overview.php</p>
<table class='statisticssummary table'>
  <tr>
    <th><?php $this->lang->eT("Users"); ?>:</th>
    <td><?php echo $usercount; ?></td>
  </tr>
  <tr>
    <th><?php $this->lang->eT("Surveys"); ?>:</th>
    <td><?php echo $surveycount; ?></td>
  </tr>
  <tr>
    <th><?php $this->lang->eT("Active surveys"); ?>:</th>
    <td><?php echo $activesurveycount; ?></td>
  </tr>
  <tr>
    <th><?php $this->lang->eT("Deactivated result tables"); ?>:</th>
    <td><?php echo $deactivatedsurveys; ?></td>
  </tr>
  <tr>
    <th><?php $this->lang->eT("Active token tables"); ?>:</th>
    <td><?php echo $activetokens; ?></td>
  </tr>
  <tr>
    <th><?php $this->lang->eT("Deactivated token tables"); ?>:</th>
    <td><?php echo $deactivatedtokens; ?></td>
  </tr>
  <?php if (Yii::app()->getConfig('iFileUploadTotalSpaceMB')>0): ?>
    <?php $fUsed = calculateTotalFileUploadUsage(); ?>
    <tr>
        <th><?php $this->lang->eT("Used/free space for file uploads"); ?>:</th>
        <td>
          <?php echo sprintf('%01.2F',$fUsed); ?> MB / 
          <?php echo sprintf('%01.2F',Yii::app()->getConfig('iFileUploadTotalSpaceMB') - $fUsed); ?> MB
        </td>
    </tr>
  <?php endif; ?>
</table>
<?php if (Yii::app()->session['USER_RIGHT_CONFIGURATOR'] == 1): ?>
  <p>
    <a href="<?php echo $this->createUrl('admin/globalsettings',array('sa'=>'showphpinfo')) ?>" target="blank" class="button">
      <?php $this->lang->eT("Show PHPInfo"); ?>
    </a>
  </p>
<?php endif; ?>
  
<h2><?php echo $this->lang->eT("Updates"); ?></h2>
<div class="form-group">
  <label for='updatecheckperiod'><?php echo $this->lang->eT("Automatically check for updates:"); ?></label>
  <div class="row">
    <div class="col-md-9">
      <select name='updatecheckperiod' id='updatecheckperiod' class='form-control'>
        <option value='0' <?php if ($thisupdatecheckperiod==0) { echo "selected='selected'"; } ?>>
          <?php echo $this->lang->eT("Never"); ?>
        </option>
        <option value='1' <?php if ($thisupdatecheckperiod==1) { echo "selected='selected'"; } ?>>
          <?php echo $this->lang->eT("Every day"); ?>
        </option>
        <option value='7' <?php if ($thisupdatecheckperiod==7) { echo "selected='selected'"; } ?>>
          <?php echo $this->lang->eT("Every week"); ?>
        </option>
        <option value='14' <?php if ($thisupdatecheckperiod==14) { echo "selected='selected'"; } ?>>
          <?php echo $this->lang->eT("Every 2 weeks"); ?>
        </option>
        <option value='30' <?php if ($thisupdatecheckperiod==30) { echo "selected='selected'";} ?>>
          <?php echo $this->lang->eT("Every month"); ?>
        </option>
      </select>
      <span class='help-block' id='lastupdatecheck'><?php echo sprintf($this->lang->gT("Last check: %s"),$updatelastcheck); ?></span>
    </div>
    <div class="col-md-3">
      <input type='button' class='btn btn-default' onclick="window.open('<?php echo $this->createUrl("admin/globalsettings/sa/updatecheck"); ?>', '_top')" value='<?php $this->lang->eT("Check now"); ?>' />
    </div>
  </div>
</div>

<div class="form-group">
  <label for='updatenotification'><?php echo $this->lang->eT("Show update notifications:"); ?></label>
  <select name='updatenotification' id='updatenotification' class='form-control'>
    <option value='never' <?php if ($sUpdateNotification=='never') { echo "selected='selected'";} ?>>
      <?php echo $this->lang->eT("Never"); ?>
    </option>
    <option value='stable' <?php if ($sUpdateNotification=='stable') { echo "selected='selected'";} ?>>
      <?php echo $this->lang->eT("For stable versions"); ?>
    </option>
    <option value='both' <?php if ($sUpdateNotification=='both') { echo "selected='selected'";} ?>>
      <?php echo $this->lang->eT("For stable and unstable versions"); ?>
    </option>
  </select>
</div>

<div class="form-group">
  <?php if (isset($updateavailable) && $updateavailable==1 && is_array($aUpdateVersions)): ?>
    <label>
      <span style="font-weight: bold;"><?php echo $this->lang->gT('The following LimeSurvey updates are available:');?></span>
    </label>
    <table>
      <?php foreach ($aUpdateVersions as $aUpdateVersion): ?>
        <tr>
          <td>
            <?php echo $aUpdateVersion['versionnumber'];?> (<?php echo $aUpdateVersion['build'];?>) 
            <?php if ($aUpdateVersion['branch']!='master') $this->lang->eT('(unstable)'); else $this->lang->eT('(stable)');?>
          </td>
          <td>
            <input type='button' onclick="window.open('<?php echo $this->createUrl("admin/update/sa/index",array('build'=>$aUpdateVersion['build'])); ?>', '_top')" value='<?php $this->lang->eT("Use ComfortUpdate"); ?>' />
            <?php if ($aUpdateVersion['branch']!='master'): ?> 
              <input type='button' onclick="window.open('http://www.limesurvey.org/en/unstable-release/viewcategory/26-unstable-releases', '_blank')" value='<?php $this->lang->eT("Download"); ?>' /> 
            <?php else: ?>
              <input type='button' onclick="window.open('http://www.limesurvey.org/en/stable-release', '_blank')" value='<?php $this->lang->eT("Download"); ?>' />
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <span class="help-block">
      <?php echo sprintf($this->lang->gT('You can %s download and update manually %s or use the %s.'),"<a href='http://manual.limesurvey.org/wiki/Upgrading_from_a_previous_version'>","</a>","<a href='http://manual.limesurvey.org/wiki/ComfortUpdate'>".$this->lang->gT('3-Click ComfortUpdate').'</a>'); ?>
    </span>

  <?php elseif (isset($updateinfo['errorcode'])): ?>
    <?php echo sprintf($this->lang->gT('There was an error on update check (%s)') , $updateinfo['errorcode']); ?>
    <textarea class='form-control' readonly='readonly' style='width:35%; height:60px; overflow: auto;'><?php echo strip_tags($updateinfo['errorhtml']); ?></textarea>

  <?php elseif ($updatable): ?>
    <span class="help-block">
      <?php $this->lang->eT('There is currently no newer LimeSurvey version available.'); ?>
    </span>

  <?php else: ?>
    <?php printf($this->lang->gT('This is an unstable version and cannot be updated using ComfortUpdate. Please check %sour website%s regularly for a newer version.'),"<a href='http://www.limesurvey.org'>","</a>"); ?>

  <?php endif; ?>
</div>