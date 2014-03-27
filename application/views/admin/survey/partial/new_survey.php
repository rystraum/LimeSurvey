<script type="text/javascript">
    var jsonUrl = '';
    var sAction = '';
    var sParameter = '';
    var sTargetQuestion = '';
    var sNoParametersDefined = '';
    var sAdminEmailAddressNeeded = '<?php $clang->eT("If you are using token functions or notifications emails you need to set an administrator email address.","js") ?>' 
    var sURLParameters = '';
    var sAddParam = '';
</script>

<?php
  if ($action == "editsurveysettings") {
    $sURL = "admin/database/index/updatesurveysettings"; 
  } else {
    $sURL = "admin/survey/sa/insert";
  }
?>
  <?php echo CHtml::form(array($sURL), "post", array("id"=>"addnewsurvey", "name"=>"addnewsurvey", "class"=>"form30")); ?>
  <input type="hidden" id="surveysettingsaction" name="action" value="insertsurvey" />
  <div class="row-fluid">
    <div class="span7">
      <fieldset>
        <legend>General</legend>
        <input type="hidden" name="language" value="en" />
        <?php $end_url = Yii::app()->getConfig('api_url') ?>
        <?php $end_url = $end_url . '?survey_id={SID}&response_id={SAVEDID}&token={TOKEN}&lang={LANG}' ?>
        <input type='hidden' name='url' value='<?php echo $end_url ?>' />
        <input type='hidden' name='urldescrip' value='' />
        <input type='hidden' name='dateformat' value='<?php echo $sDateFormatDefault ?>' />
        <input type='hidden' name='numberformat' value='<?php echo $sRadixDefault ?>' />
        <input type='hidden' name='admin' value='<?php echo $owner['full_name'] ; ?>' />
        <input type='hidden' name='adminemail' value='<?php echo $owner['email'] ; ?>' /></li>
        <input type='hidden' name='bounce_email' value='<?php echo $owner['bounce_email'] ; ?>' /></li>
        <input type='hidden' name='faxto' value='' />
        <div class="control-group">
          <label class="control-label" for="surveyls_title"><?php $clang->eT("Title") ?></label>
          <div class="controls">
            <input type="text" style="width: 75%" maxlength="200" id="surveyls_title" name="surveyls_title" required="required" autofocus="autofocus" />
            <span class="help-inline annotation"><?php $clang->eT("Required") ?></span>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="description"><?php $clang->eT("Description") ?></label>
          <div class="controls">
            <textarea cols="80" rows="10" id="description" name="description"></textarea>
            <?php echo getEditor("survey-desc", "description", "[" . $clang->gT("Description:", "js") . "]", "", "", "", $action); ?>
          </div>
        </div>

        <div class="control-group">
          <label for="welcome"><?php $clang->et("Welcome message") ?> </label>
          <div class="controls">
            <textarea cols="80" rows="10" id="welcome" name="welcome"></textarea>
            <?php echo getEditor("survey-welc", "welcome", "[" . $clang->gT("Welcome message:", "js") . "]", "", "", "", $action) ?>
          </div>
        </div>
        
        <?php $end_url = Yii::app()->getConfig('api_url') ?>
        <?php $end_url = $end_url . '?survey_id={SID}&response_id={SAVEDID}&token={TOKEN}&lang={LANG}' ?>
        <div class="control-group">
          <label for="url"><?php $clang->eT("End URL:") ?></label>
          <div class="controls">
            <input type='text' style="width: 40%" maxlength='2000' id='url' name='url' value="<?php echo $end_url ?>" />
          </div>
        </div>

        <div class="control-group">
          <label for="endtext"><?php $clang->eT("End message") ?> </label>
          <div class="controls">
            <textarea cols="80" id="endtext" rows="10" name="endtext"></textarea>
            <?php echo getEditor("survey-endtext", "endtext", "[" . $clang->gT("End message:", "js") . "]", "", "", "", $action) ?>
          </div>
        </div>
        
        <div class="control-group">
          <button type="submit" class="btn btn-primary btn-large" ><?php $clang->eT("Save") ?></button>
        </div>
      </fieldset>
    </div> <!-- .span7 -->

    <div class="span5">
      <fieldset>
        <legend><?php $clang->eT("Presentation & navigation") ?></legend>
        <input type='hidden' name='template' value='default' />
        <input type='hidden' name='showwelcome' value='N' />
        <input type='hidden' name='navigationdelay' value='0' />
        <input type='hidden' name='allowprev' value='Y' />
        <input type='hidden' name='questionindex' value='1' />
        <input type='hidden' name='nokeyboard' value='N' />
        <input type='hidden' name='printanswers' value='Y' />
        <input type='hidden' name='publicgraphs' value='N' />
        <input type='hidden' name='autoredirect' value='Y' />
        <?php if(($showxquestions !== 'show') || ($showxquestions !== 'hide')): ?>
          <input type='hidden' name='showxquestions' value='N' />
        <?php endif ?>

        <div class="control-group">
          <label for='format'><?php $clang->eT("Format:") ?></label>
          <div class="controls">
            <select id='format' name='format'>
              <option value='S' <?php if ($esrow['format'] == "S") { echo "selected='selected'"; } ?>>
                <?php $clang->et("Question by Question") ?>
              </option>

              <option value='G' <?php if ($esrow['format'] == "G") { echo "selected='selected'"; } ?>>
                <?php $clang->et("Group by Group") ?>
              </option>

              <option value='A' <?php if ($esrow['format'] == "A") { echo "selected='selected'"; } ?>>
                <?php $clang->et("All in one") ?>
              </option>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label for='showprogress'><?php $clang->eT("Show progress bar") ?></label>
          <div class="controls">
            <select id='showprogress' name='showprogress'>
              <option value='Y'
                <?php if (!isset($esrow['showprogress']) || !$esrow['showprogress'] || $esrow['showprogress'] == "Y") { ?>
                    selected='selected'
                    <?php } ?>
                ><?php $clang->et("Yes") ?>
              </option>
              <option value='N'
                <?php if (isset($esrow['showprogress']) && $esrow['showprogress'] == "N") { ?>
                    selected='selected'
                    <?php } ?>
                ><?php $clang->et("No") ?></option>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label for='publicstatistics'><?php $clang->eT("Public statistics?") ?></label>
          <div class="controls">
            <select id='publicstatistics' name='publicstatistics'>
              <option value='Y'
                <?php if (!isset($esrow['publicstatistics']) || !$esrow['publicstatistics'] || $esrow['publicstatistics'] == "Y") { ?>
                    selected='selected'
                    <?php } ?>
                ><?php $clang->et("Yes") ?>
              </option>
              <option value='N'
                <?php if (isset($esrow['publicstatistics']) && $esrow['publicstatistics'] == "N") { ?>
                    selected='selected'
                    <?php } ?>
                ><?php $clang->et("No") ?>
              </option>
            </select>
          </div>
        </div>

        <div class="control-group">
          <label for="dis_showgroupinfo"><?php $clang->eT('Show group name and/or group description') ?></label>
          <div class="controls">
            <?php if($showgroupinfo == 'both'): ?>
              <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="B" />
              <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="<?php $clang->et('Show both (Forced by the system administrator)') ?>" size="30" />
            <?php elseif($showgroupinfo == 'name'): ?>
              <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="N" />
              <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="<?php $clang->et('Show group name only (Forced by the system administrator)') ?>" size="30" />
            <?php elseif($showgroupinfo == 'description'): ?>
              <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="D" />
              <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="<?php $clang->et('Show group description only (Forced by the system administrator)') ?>" size="30" />
            <?php elseif($showgroupinfo == 'none'): ?>
              <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="X" />
              <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="<?php $clang->et('Hide both (Forced by the system administrator)') ?>" size="30" /></div>
            <?php else: ?>
              <?php
                $sel_showgri = array( 'B' => '' , 'D' => '' , 'N' => '' , 'X' => '' );
                if (isset($esrow['showgroupinfo'])) {
                    $set_showgri = $esrow['showgroupinfo'];
                    $sel_showgri[$set_showgri] = ' selected="selected"';
                }
                if (empty($sel_showgri['B']) && empty($sel_showgri['D']) && empty($sel_showgri['N']) && empty($sel_showgri['X'])) {
                    $sel_showgri['C'] = ' selected="selected"';
                }; 
              ?>
              <select id="showgroupinfo" name="showgroupinfo">
                <option value="B"<?php echo $sel_showgri['B']; ?>><?php $clang->et('Show both') ?></option>
                <option value="N"<?php echo $sel_showgri['N']; ?>><?php $clang->et('Show group name only') ?></option>
                <option value="D"<?php echo $sel_showgri['D']; ?>><?php $clang->et('Show group description only') ?></option>
                <option value="X"<?php echo $sel_showgri['X']; ?>><?php $clang->et('Hide both') ?></option>
              </select>
              <?php unset($sel_showgri,$set_showgri) ?>
            <?php endif ?>
          </div>
        </div>

        <div class="control-group">
          <label for="dis_showqnumcode"><?php $clang->eT('Show question number and/or code') ?></label>
          <div class="controls">
            <?php if($showqnumcode == 'none'): ?>
              <input type="hidden" name="showqnumcode" id="showqnumcode" value="X" />
              <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="<?php $clang->et('Hide both (Forced by the system administrator)') ?>" size="30" />
            <?php elseif($showqnumcode == 'number'): ?>
              <input type="hidden" name="showqnumcode" id="showqnumcode" value="N" />
              <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="<?php $clang->eT('Show question number only (Forced by the system administrator)') ; ?>" size="30" />
            <?php elseif($showqnumcode == 'code'): ?>
              <input type="hidden" name="showqnumcode" id="showqnumcode" value="C" />
              <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="<?php $clang->et('Show question code only (Forced by the system administrator)') ?>" size="30" />
            <?php elseif($showqnumcode == 'both'): ?>
              <input type="hidden" name="showqnumcode" id="showqnumcode" value="B" />
              <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="<?php $clang->et('Show both (Forced by the system administrator)') ?>" size="30" />
            <?php else: ?>
              <?php 
                $sel_showqnc = array( 'B' => '' , 'C' => '' , 'N' => '' , 'X' => '' );
                if (isset($esrow['showqnumcode'])) {
                  $set_showqnc = $esrow['showqnumcode'];
                  $sel_showqnc[$set_showqnc] = ' selected="selected"';
                }
                
                if (empty($sel_showqnc['B']) && empty($sel_showqnc['C']) && empty($sel_showqnc['N']) && empty($sel_showqnc['X'])) {
                  $sel_showqnc['X'] = ' selected="selected"';
                }
              ?>
              <select id="showqnumcode" name="showqnumcode">
                <option value="B"<?php echo $sel_showqnc['B']; ?>><?php $clang->et('Show both') ?></option>
                <option value="N"<?php echo $sel_showqnc['N']; ?>><?php $clang->et('Show question number only') ?></option>
                <option value="C"<?php echo $sel_showqnc['C']; ?>><?php $clang->et('Show question code only') ?></option>
                <option value="X"<?php echo $sel_showqnc['X']; ?>><?php $clang->et('Hide both') ?></option>
              </select>
              <?php unset($sel_showqnc,$set_showqnc) ?>
            <?php endif ?>
          </div>
        </div>

        <div class="control-group">
          <label for="dis_shownoanswer"><?php $clang->eT('Show "No answer"') ?></label>
          <div class="controls">
            <?php if($shownoanswer == 0): ?>
              <input type="hidden" name="shownoanswer" id="shownoanswer" value="N" />
              <input type="text" name="dis_shownoanswer" id="dis_shownoanswer" disabled="disabled" value="<?php $clang->et('Off (Forced by the system administrator)') ?>" size="30" />
            <?php elseif($shownoanswer == 2): ?>
              <?php 
                $sel_showno = array( 'Y' => '' , 'N' => '' );
                if (isset($esrow['shownoanswer'])) {
                  $set_showno = $esrow['shownoanswer'];
                  $sel_showno[$set_showno] = ' selected="selected"';
                }
                
                if (empty($sel_showno)) {
                  $sel_showno['Y'] = ' selected="selected"';
                }
              ?>
              <select id="shownoanswer" name="shownoanswer">
                <option value="Y"<?php echo $sel_showno['Y']; ?>><?php $clang->et('Yes') ?></option>
                <option value="N"<?php echo $sel_showno['N']; ?>><?php $clang->et('No') ?></option>
              </select>
            <?php else: ?>
              <input type="hidden" name="shownoanswer" id="shownoanswer" value="Y" />
              <input type="text" name="dis_shownoanswer" id="dis_shownoanswer" disabled="disabled" value="<?php $clang->et('On (Forced by the system administrator)') ?>" size="30" />
            <?php endif ?>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend><?php $clang->et("Notification & data management") ?></legend>
        <input type='hidden' name='datestamp' value='Y' />
        <input type='hidden' name='ipaddr' value='Y' />
        <input type='hidden' name='refurl' value='Y' />
        <input type='hidden' name='savetimings' value='Y' />
        <input type='hidden' name='assessments' value='N' />
        <input type='hidden' name='googleanalyticsapikey' value='' />
        <input type='hidden' name='googleanalyticsstyle' value='0' />
        <input type='hidden' id='adminemail' name='adminemail' value='<?php echo htmlspecialchars($owner['email']) ?>' />
        <input type='hidden' id='emailnotificationto' name='emailnotificationto' value="<?php echo htmlspecialchars($owner['email']) ?>" />

        <div class="control-group">
          <label for='emailresponseto'><?php $clang->et("Send detailed admin notification email to:") ?></label>
          <div class="controls">
            <input size="30" type='email' value="<?php echo htmlspecialchars($esrow['emailresponseto']); ?>" id='emailresponseto' name='emailresponseto' />
          </div>
        </div>

        <div class="control-group">
          <label for='allowsave'><?php $clang->et("Participant may save and resume later?") ?></label>
          <div class="controls">
            <select id='allowsave' name='allowsave'>
                <option value='Y' <?php if (!$esrow['allowsave'] || $esrow['allowsave'] == "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->et("Yes") ?>
                </option>
                <option value='N' <?php if ($esrow['allowsave'] == "N") { echo "selected='selected'"; } ?>>
                    <?php $clang->et("No") ?>
                </option>
            </select>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend><?php $clang->et("Publication & access control") ?></legend>
        <input type='hidden' name='usecaptcha' value='D' />

        <div class="control-group">
          <label for='public'><?php $clang->eT("List survey publicly:");?></label>
          <select id='public' name='public'>
            <option value='Y'
            <?php if (!isset($esrow['listpublic']) || !$esrow['listpublic'] || $esrow['listpublic'] == "Y") { ?>
                selected='selected'
            <?php } ?>
            ><?php $clang->et("Yes") ?></option>
              
            <option value='N'
            <?php if (isset($esrow['listpublic']) && $esrow['listpublic'] == "N") { ?>
                selected='selected'
            <?php } ?>
             ><?php $clang->et("No") ?></option>
          </select>
        </div>
        
        <div class="control-group">
          <label for='startdate'><?php $clang->et("Start date/time:") ?></label>
          <input type='text' class='popupdatetime' id='startdate' size='20' name='startdate' value="<?php echo $startdate; ?>" />
        </div>

        <div class="control-group">
          <label for='expires'><?php $clang->et("Expiry date/time:") ?></label>
          <input type='text' class='popupdatetime' id='expires' size='20' name='expires' value="<?php echo $expires; ?>" />
        </div>

        <div class="control-group">
          <label for='usecookie'><?php $clang->et("Prevent repeated participation?") ?></label>
          <select name='usecookie' id='usecookie'>
            <option value='Y' <?php if ($esrow['usecookie'] == "Y") { echo "selected='selected'"; } ?>>
              <?php $clang->et("Yes") ?>
            </option>
            <option value='N' <?php if ($esrow['usecookie'] != "Y") { echo "selected='selected'"; } ?>>
              <?php $clang->et("No") ?>
            </option>
           </select>
        </div>
      </fieldset>

      <fieldset>
        <legend><?php $clang->et("Tokens") ?></legend>
        <input type='hidden' name='anonymized' value='N' />
        <input type='hidden' name='htmlemail' value='Y' />
        <input type='hidden' name='sendconfirmation' value='Y' />
        <input type='hidden' name='tokenlength' value='20' />

        <div class="control-group">
          <label for='tokenanswerspersistence'><?php $clang->et("Enable token-based response persistence?") ?></label>
          <select id='tokenanswerspersistence' name='tokenanswerspersistence' onchange="javascript: if (document.getElementById('anonymized').value == 'Y') { alert('<?php $clang->et("This option can't be set if the `Anonymized responses` option is active.","js") ?>'); this.value='N';}">
            <option value='Y' <?php if ($esrow['tokenanswerspersistence'] == "Y") { echo "selected='selected'"; } ?>>
              <?php $clang->et("Yes") ?>
            </option>
            <option value='N' <?php if ($esrow['tokenanswerspersistence'] == "N") { echo "selected='selected'"; } ?>>
              <?php $clang->et("No") ?>
            </option>
          </select>
        </div>
        <div class="control-group">
          <label for='alloweditaftercompletion' title='<?php $clang->et("With not anonymous survey: user can update his answer after completion, else user can add new answers without restriction.") ?>'><?php $clang->et("Allow multiple responses or update responses with one token?") ?></label>
          <select id='alloweditaftercompletion' name='alloweditaftercompletion'>
            <option value='Y' <?php if ($esrow['alloweditaftercompletion'] == "Y") { echo "selected='selected'"; } ?>>
              <?php $clang->et("Yes") ?>
            </option>
            <option value='N' <?php if ($esrow['alloweditaftercompletion'] == "N") { echo "selected='selected'"; } ?>>
              <?php $clang->et("No") ?>
            </option>
          </select>
        </div>

        <div class="control-group">
          <label for='allowregister'><?php $clang->et("Allow public registration?") ?></label>
          <select id='allowregister' name='allowregister'>
            <option value='Y' <?php if ($esrow['allowregister'] == "Y") { echo "selected='selected'"; } ?>>
              <?php $clang->et("Yes") ?>
            </option>
            <option value='N' <?php if ($esrow['allowregister'] != "Y") { echo "selected='selected'"; } ?>>
              <?php $clang->et("No") ?>
            </option>
          </select>
        </div>
      </fieldset>
    </div> <!-- .span5 -->
  </div>
</form>