<div class="form-group">
  <label for='sitename'><?php $clang->eT("Site name:").((Yii::app()->getConfig("demoMode")==true)?'*':''); ?></label>
  <input type='text' class='form-control' size='50' id='sitename' name='sitename' value="<?php echo htmlspecialchars(getGlobalSetting('sitename')); ?>" />
</div>

<div class="form-group">
  <?php
    $thisdefaulttemplate = getGlobalSetting('defaulttemplate');
    $templatenames = array_keys(getTemplateList());
  ?>
  <label for="defaulttemplate"><?php $clang->eT("Default template:"); ?></label>
  <select name="defaulttemplate" id="defaulttemplate" class='form-control'>
    <?php
      foreach ($templatenames as $templatename) {
        echo "<option value='$templatename'";
        if ($thisdefaulttemplate == $templatename) { echo " selected='selected' "; }
        echo "> $templatename </option>";
      }
    ?>
  </select>
</div>

<div class="form-group">
  <?php
    $thisadmintheme = getGlobalSetting('admintheme');
    $adminthemes = array_keys(getAdminThemeList());
  ?>

  <label for="admintheme"><?php $clang->eT("Administration template:"); ?></label>
  <select name="admintheme" id="admintheme" class='form-control'>
    <?php
      foreach ($adminthemes as $templatename) {
        echo "<option value='{$templatename}'";
        if ($thisadmintheme==$templatename) { echo " selected='selected' ";}
        echo ">{$templatename}</option>";
      }
    ?>
  </select>
</div>

<div class="form-group">
  <?php $thisdefaulthtmleditormode = getGlobalSetting('defaulthtmleditormode'); ?>
  <label for='defaulthtmleditormode'><?php $clang->eT("Default HTML editor mode:").((Yii::app()->getConfig("demoMode")==true)?'*':''); ?></label>
  <select name='defaulthtmleditormode' id='defaulthtmleditormode' class='form-control'>
    <option value='none' <?php if ($thisdefaulthtmleditormode=='none') { echo "selected='selected'";} ?>>
      <?php $clang->eT("No HTML editor"); ?>
    </option>
    <option value='inline' <?php if ($thisdefaulthtmleditormode=='inline') { echo "selected='selected'";} ?>>
      <?php $clang->eT("Inline HTML editor (default)"); ?>
    </option>
    <option value='popup' <?php if ($thisdefaulthtmleditormode=='popup') { echo "selected='selected'";} ?>>
      <?php $clang->eT("Popup HTML editor"); ?>
    </option>
  </select>
</div>

<div class="form-group">
  <?php $thisdefaultquestionselectormode = getGlobalSetting('defaultquestionselectormode'); ?>
  <label for='defaultquestionselectormode'><?php $clang->eT("Question type selector:").((Yii::app()->getConfig("demoMode")==true)?'*':''); ?></label>
  <select name='defaultquestionselectormode' id='defaultquestionselectormode' class='form-control'>
    <option value='default' <?php if ($thisdefaultquestionselectormode=='default') { echo "selected='selected'";} ?>>
      <?php $clang->eT("Full selector (default)"); ?>
    </option>
    <option value='none' <?php if ($thisdefaultquestionselectormode=='none') { echo "selected='selected'";} ?>>
      <?php $clang->eT("Simple selector"); ?>
    </option>
  </select>
</div>

<div class="form-group">
  <?php $thisdefaulttemplateeditormode = getGlobalSetting('defaulttemplateeditormode'); ?>
  <label for='defaulttemplateeditormode'><?php $clang->eT("Template editor:").((Yii::app()->getConfig("demoMode")==true)?'*':''); ?></label>
  <select name='defaulttemplateeditormode' id='defaulttemplateeditormode' class='form-control'>
    <option value='default' <?php if ($thisdefaulttemplateeditormode=='default') { echo "selected='selected'";} ?>>
      <?php $clang->eT("Full template editor (default)"); ?>
    </option>
    <option value='none' <?php if ($thisdefaulttemplateeditormode=='none') { echo "selected='selected'";} ?>>
      <?php $clang->eT("Simple template editor"); ?>
    </option>
  </select>
</div>

<div class="form-group">
  <?php $dateformatdata=getDateFormatData(Yii::app()->session['dateformat']); ?>
  <label for='timeadjust'><?php $clang->eT("Time difference (in hours):"); ?></label>
  <input type='text' class='form-control' size='10' id='timeadjust' name='timeadjust' value="<?php echo htmlspecialchars(str_replace(array('+',' hours',' minutes'),array('','',''),getGlobalSetting('timeadjust'))/60); ?>" />
  <span class="help-block">
    <?php echo $clang->gT("Server time:").' '.convertDateTimeFormat(date('Y-m-d H:i:s'),'Y-m-d H:i:s',$dateformatdata['phpdate'].' H:i') ?>
  </span>
  <span class="help-block">
    <?php echo $clang->gT("Corrected time:").' '.convertDateTimeFormat(dateShift(date("Y-m-d H:i:s"), 'Y-m-d H:i:s', getGlobalSetting('timeadjust')),'Y-m-d H:i:s',$dateformatdata['phpdate'].' H:i'); ?>
  </span>
</div>

<div class="form-group">  
  <label for='iSessionExpirationTime'><?php $clang->eT("Session lifetime (for surveys only, in seconds):"); ?></label>
  <input type='text' class='form-control' size='10' id='iSessionExpirationTime' name='iSessionExpirationTime' value="<?php echo htmlspecialchars(getGlobalSetting('iSessionExpirationTime')); ?>" />
</div>

<div class="form-group">
  <label for='ipInfoDbAPIKey'><?php $clang->eT("IP Info DB API Key:"); ?></label>
  <input type='text' class='form-control' size='35' id='ipInfoDbAPIKey' name='ipInfoDbAPIKey' value="<?php echo htmlspecialchars(getGlobalSetting('ipInfoDbAPIKey')); ?>" />
</div>

<div class="form-group">
  <label for='googleMapsAPIKey'><?php $clang->eT("Google Maps API key:"); ?></label>
  <input type='text' class='form-control' size='35' id='googleMapsAPIKey' name='googleMapsAPIKey' value="<?php echo htmlspecialchars(getGlobalSetting('googleMapsAPIKey')); ?>" />
</div>

<div class="form-group">
  <label for='googleanalyticsapikey'><?php $clang->eT("Google Analytics API key:"); ?></label>
  <input type='text' class='form-control' size='35' id='googleanalyticsapikey' name='googleanalyticsapikey' value="<?php echo htmlspecialchars(getGlobalSetting('googleanalyticsapikey')); ?>" />
</div>

<div class="form-group">
  <label for='googletranslateapikey'><?php $clang->eT("Google Translate API key:"); ?></label>
  <input type='text' class='form-control' size='35' id='googletranslateapikey' name='googletranslateapikey' value="<?php echo htmlspecialchars(getGlobalSetting('googletranslateapikey')); ?>" />
</div>