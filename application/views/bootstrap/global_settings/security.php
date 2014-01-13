<ul>
  <?php $thissurveyPreview_require_Auth = getGlobalSetting('surveyPreview_require_Auth'); ?>
  <li><label for='surveyPreview_require_Auth'><?php $clang->eT("Survey preview only for administration users"); ?></label>
      <select id='surveyPreview_require_Auth' name='surveyPreview_require_Auth'>
          <option value='1'
              <?php if ($thissurveyPreview_require_Auth == true) { echo " selected='selected'";}?>
              ><?php $clang->eT("Yes"); ?></option>
          <option value='0'
              <?php if ($thissurveyPreview_require_Auth == false) { echo " selected='selected'";}?>
              ><?php $clang->eT("No"); ?></option>
      </select></li>

  <?php $thisfilterxsshtml = getGlobalSetting('filterxsshtml'); ?>
  <li><label for='filterxsshtml'><?php $clang->eT("Filter HTML for XSS:").((Yii::app()->getConfig("demoMode")==true)?'*':''); ?></label>
      <select id='filterxsshtml' name='filterxsshtml'>
          <option value='1'
              <?php if ( $thisfilterxsshtml == true) { echo " selected='selected'";}?>
              ><?php $clang->eT("Yes"); ?></option>
          <option value='0'
              <?php if ( $thisfilterxsshtml == false) { echo " selected='selected'";}?>
              ><?php $clang->eT("No"); ?></option>
      </select></li>

  <?php $thisusercontrolSameGroupPolicy = getGlobalSetting('usercontrolSameGroupPolicy'); ?>
  <li><label for='usercontrolSameGroupPolicy'><?php $clang->eT("Group member can only see own group:"); ?></label>
      <select id='usercontrolSameGroupPolicy' name='usercontrolSameGroupPolicy'>
          <option value='1'
              <?php if ( $thisusercontrolSameGroupPolicy == true) { echo " selected='selected'";}?>
              ><?php $clang->eT("Yes"); ?></option>
          <option value='0'
              <?php if ( $thisusercontrolSameGroupPolicy == false) { echo " selected='selected'";}?>
              ><?php $clang->eT("No"); ?></option>
      </select></li>

  <?php 
    $thisforce_ssl = getGlobalSetting('force_ssl');
    $opt_force_ssl_on = $opt_force_ssl_off = $opt_force_ssl_neither = '';
    $warning_force_ssl = $clang->gT('Warning: Before turning on HTTPS, ')
    . '<a href="https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" title="'
    . $clang->gT('Test if your server has SSL enabled by clicking on this link.').'">'
    . $clang->gT('check if this link works.').'</a><br/> '
    . $clang->gT("If the link does not work and you turn on HTTPS, LimeSurvey will break and you won't be able to access it.");
    switch($thisforce_ssl)
    {
        case 'on':
            $warning_force_ssl = '&nbsp;';
            break;
        case 'off':
        case 'neither':
            break;
        default:
            $thisforce_ssl = 'neither';
    };
    $this_opt = 'opt_force_ssl_'.$thisforce_ssl;
    $$this_opt = ' selected="selected"';
  ?>
  <li>
    <label for="force_ssl"><?php $clang->eT('Force HTTPS:'); ?></label>
    <select name="force_ssl" id="force_ssl">
      <option value="on" <?php echo $opt_force_ssl_on; ?>><?php $clang->eT('On'); ?></option>
      <option value="off" <?php echo $opt_force_ssl_off; ?>><?php $clang->eT('Off'); ?></option>
      <option value="neither" <?php echo $opt_force_ssl_neither; ?>><?php $clang->eT("Don't force on or off"); ?></option>
    </select>
  </li>
  <li><span style='font-size:0.7em;'><?php echo $warning_force_ssl; ?></span></li>
  <?php unset($thisforce_ssl,$opt_force_ssl_on,$opt_force_ssl_off,$opt_force_ssl_neither,$warning_force_ssl,$this_opt); ?>
</ul>