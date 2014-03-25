<div id='advanced'>
    <h2><?php $clang->eT("Presentation & navigation"); ?></h2>
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
    <ul>
        <li><label for='format'><?php $clang->eT("Format:"); ?></label>
            <select id='format' name='format'>
                <option value='S'
                    <?php if ($esrow['format'] == "S" || !$esrow['format']) { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("Question by Question"); ?>
                </option>
                <option value='G'
                    <?php if ($esrow['format'] == "G") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("Group by Group"); ?>
                </option>
                <option value='A'
                    <?php if ($esrow['format'] == "A") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("All in one"); ?>
                </option>
            </select>
        </li>

        <li><label for='showprogress'><?php $clang->eT("Show progress bar"); ?></label>
            <select id='showprogress' name='showprogress'>
                <option value='Y'
                    <?php if (!isset($esrow['showprogress']) || !$esrow['showprogress'] || $esrow['showprogress'] == "Y") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("Yes"); ?>
                </option>
                <option value='N'
                    <?php if (isset($esrow['showprogress']) && $esrow['showprogress'] == "N") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("No"); ?></option>
            </select>
        </li>


        <li><label for='publicstatistics'><?php $clang->eT("Public statistics?"); ?></label>
            <select id='publicstatistics' name='publicstatistics'>
                <option value='Y'
                    <?php if (!isset($esrow['publicstatistics']) || !$esrow['publicstatistics'] || $esrow['publicstatistics'] == "Y") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("Yes"); ?>
                </option>
                <option value='N'
                    <?php if (isset($esrow['publicstatistics']) && $esrow['publicstatistics'] == "N") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("No"); ?>
                </option>
            </select>
        </li>

        <!--            // Show {GROUPNAME} and/or {GROUPDESCRIPTION} block
        $show_dis_pre =<li><label for="dis_showgroupinfo"><?php $clang->eT('Show group name and/or group description'); ?></label> <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="
        $show_dis_mid = " /> <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value=" -->
        <?php switch ($showgroupinfo) {
                case 'both': ?>
                <li><label for="dis_showgroupinfo"><?php $clang->eT('Show group name and/or group description'); ?></label> <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="B" /> <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="
                        <?php $clang->eT('Show both (Forced by the system administrator)'); ?>

                        " size="70" /></li>
                <?php    break;
                case 'name': ?>
                <li><label for="dis_showgroupinfo"><?php $clang->eT('Show group name and/or group description'); ?></label> <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="N" /> <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="
                        <?php $clang->eT('Show group name only (Forced by the system administrator)'); ?>

                        " size="70" /></li>
                <?php     break;
                case 'description': ?>
                <li><label for="dis_showgroupinfo"><?php $clang->eT('Show group name and/or group description'); ?></label> <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="D" /> <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="
                        <?php $clang->eT('Show group description only (Forced by the system administrator)'); ?>

                        " size="70" /></li>
                <?php    break;
                case 'none': ?>
                <li><label for="dis_showgroupinfo"><?php $clang->eT('Show group name and/or group description'); ?></label> <input type="hidden" name="showgroupinfo" id="showgroupinfo" value="X" /> <input type="text" name="dis_showgroupinfo" id="dis_showgroupinfo" disabled="disabled" value="
                        <?php $clang->eT('Hide both (Forced by the system administrator)'); ?>

                        " size="70" /></li>

                <?php    break;
                case 'choose':
                default:
                    $sel_showgri = array( 'B' => '' , 'D' => '' , 'N' => '' , 'X' => '' );
                    if (isset($esrow['showgroupinfo'])) {
                        $set_showgri = $esrow['showgroupinfo'];
                        $sel_showgri[$set_showgri] = ' selected="selected"';
                    }
                    if (empty($sel_showgri['B']) && empty($sel_showgri['D']) && empty($sel_showgri['N']) && empty($sel_showgri['X'])) {
                        $sel_showgri['C'] = ' selected="selected"';
                    }; ?>
                <li><label for="showgroupinfo"><?php $clang->eT('Show group name and/or group description'); ?></label>
                    <select id="showgroupinfo" name="showgroupinfo">
                        <option value="B"<?php echo $sel_showgri['B']; ?>><?php $clang->eT('Show both'); ?></option>
                        <option value="N"<?php echo $sel_showgri['N']; ?>><?php $clang->eT('Show group name only'); ?></option>
                        <option value="D"<?php echo $sel_showgri['D']; ?>><?php $clang->eT('Show group description only'); ?></option>
                        <option value="X"<?php echo $sel_showgri['X']; ?>><?php $clang->eT('Hide both'); ?></option>
                    </select></li>
                <?php unset($sel_showgri,$set_showgri);
                    break;
            }; ?>


        <!--$show_dis_pre =<li><label for="dis_showqnumcode"><?php $clang->eT('Show question number and/or code'); ?></label> <input type="hidden" name="showqnumcode" id="showqnumcode" value="
        $show_dis_mid = " /> <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value=" -->
        <?php switch ($showqnumcode) {
                case 'none': ?>
                <li><label for="dis_showqnumcode"><?php $clang->eT('Show question number and/or code'); ?></label> <input type="hidden" name="showqnumcode" id="showqnumcode" value="X" /> <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="
                        <?php $clang->eT('Hide both (Forced by the system administrator)'); ?>
                        " size="70" /></li>
                <?php    break;
                case 'number': ?>
                <li><label for="dis_showqnumcode"><?php $clang->eT('Show question number and/or code'); ?></label> <input type="hidden" name="showqnumcode" id="showqnumcode" value="N" /> <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="
                        <?php $clang->eT('Show question number only (Forced by the system administrator)') ; ?>
                        " size="70" /></li>
                <?php    break;
                case 'code': ?>
                <li><label for="dis_showqnumcode"><?php $clang->eT('Show question number and/or code'); ?></label> <input type="hidden" name="showqnumcode" id="showqnumcode" value="C" /> <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="
                        <?php $clang->eT('Show question code only (Forced by the system administrator)'); ?>
                        " size="70" /></li>
                <?php    break;
                case 'both': ?>
                <li><label for="dis_showqnumcode"><?php $clang->eT('Show question number and/or code'); ?></label> <input type="hidden" name="showqnumcode" id="showqnumcode" value="B" /> <input type="text" name="dis_showqnumcode" id="dis_showqnumcode" disabled="disabled" value="
                        <?php $clang->eT('Show both (Forced by the system administrator)'); ?>
                        " size="70" /></li>
                <?php    break;
                case 'choose':
                default:
                    $sel_showqnc = array( 'B' => '' , 'C' => '' , 'N' => '' , 'X' => '' );
                    if (isset($esrow['showqnumcode'])) {
                        $set_showqnc = $esrow['showqnumcode'];
                        $sel_showqnc[$set_showqnc] = ' selected="selected"';
                    }
                    if (empty($sel_showqnc['B']) && empty($sel_showqnc['C']) && empty($sel_showqnc['N']) && empty($sel_showqnc['X'])) {
                        $sel_showqnc['X'] = ' selected="selected"';
                    }; ?>
                <li><label for="showqnumcode"><?php $clang->eT('Show question number and/or code'); ?></label>
                    <select id="showqnumcode" name="showqnumcode">
                        <option value="B"<?php echo $sel_showqnc['B']; ?>><?php $clang->eT('Show both'); ?></option>
                        <option value="N"<?php echo $sel_showqnc['N']; ?>><?php $clang->eT('Show question number only'); ?></option>
                        <option value="C"<?php echo $sel_showqnc['C']; ?>><?php $clang->eT('Show question code only'); ?></option>
                        <option value="X"<?php echo $sel_showqnc['X']; ?>><?php $clang->eT('Hide both'); ?></option>
                    </select></li>
                <?php unset($sel_showqnc,$set_showqnc);
                    break;
            }; ?>



        <!--    $show_dis_pre =<li><label for="dis_shownoanswer"><?php $clang->eT('Show "No answer"'); ?></label> <input type="hidden" name="shownoanswer" id="shownoanswer" value="
        $show_dis_mid = " /> <input type="text" name="dis_shownoanswer" id="dis_shownoanswer" disabled="disabled" value=" -->
        <?php switch ($shownoanswer) {
                case 0: ?>
                <li><label for="dis_shownoanswer"><?php $clang->eT('Show "No answer"'); ?></label> <input type="hidden" name="shownoanswer" id="shownoanswer" value="N" /> <input type="text" name="dis_shownoanswer" id="dis_shownoanswer" disabled="disabled" value="<?php $clang->eT('Off (Forced by the system administrator)'); ?>
                        " size="70" /></li>
                <?php  break;
                case 2:
                    $sel_showno = array( 'Y' => '' , 'N' => '' );
                    if (isset($esrow['shownoanswer'])) {
                        $set_showno = $esrow['shownoanswer'];
                        $sel_showno[$set_showno] = ' selected="selected"';
                    };
                    if (empty($sel_showno)) {
                        $sel_showno['Y'] = ' selected="selected"';
                    }; ?>
                <li><label for="shownoanswer"><?php $clang->eT('Show "No answer"'); ?></label>
                    <select id="shownoanswer" name="shownoanswer">
                        <option value="Y"<?php echo $sel_showno['Y']; ?>><?php $clang->eT('Yes'); ?></option>
                        <option value="N"<?php echo $sel_showno['N']; ?>><?php $clang->eT('No'); ?></option>
                    </select></li>
                <?php  break;
                default: ?>
                <li><label for="dis_shownoanswer"><?php $clang->eT('Show "No answer"'); ?></label> <input type="hidden" name="shownoanswer" id="shownoanswer"
                        value="Y" /> <input type="text" name="dis_shownoanswer" id="dis_shownoanswer" disabled="disabled" value="<?php $clang->eT('On (Forced by the system administrator)'); ?>
                        " size="70" /></li>
                <?php    break;
            }; ?>
    </ul>

    <h2><?php $clang->eT("Notification & data management"); ?></h2>
    <input type='hidden' name='datestamp' value='Y' />
    <input type='hidden' name='ipaddr' value='Y' />
    <input type='hidden' name='refurl' value='Y' />
    <input type='hidden' name='savetimings' value='Y' />
    <input type='hidden' name='assessments' value='N' />
    <input type='hidden' name='googleanalyticsapikey' value='' />
    <input type='hidden' name='googleanalyticsstyle' value='0' />

    <ul>
        <li>
            <label for='emailnotificationto'><?php $clang->eT("Send basic admin notification email to:"); ?></label>
            <input size='70' type='email' value="<?php echo htmlspecialchars($esrow['emailnotificationto']); ?>" id='emailnotificationto' name='emailnotificationto' />
        </li>

        <li>
            <label for='emailresponseto'><?php $clang->eT("Send detailed admin notification email to:"); ?></label>
            <input size='70' type='email' value="<?php echo htmlspecialchars($esrow['emailresponseto']); ?>" id='emailresponseto' name='emailresponseto' />
        </li>

        <li>
            <label for='allowsave'><?php $clang->eT("Participant may save and resume later?"); ?></label>
            <select id='allowsave' name='allowsave'>
                <option value='Y' <?php if (!$esrow['allowsave'] || $esrow['allowsave'] == "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("Yes"); ?>
                </option>
                <option value='N' <?php if ($esrow['allowsave'] == "N") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("No"); ?>
                </option>
            </select>
        </li>
    </ul>

    <h2><?php $clang->eT("Publication & access control"); ?></h2>
    <input type='hidden' name='usecaptcha' value='D' />
    <ul>
        <li>
            <label for='public'><?php $clang->eT("List survey publicly:");?></label>
                <select id='public' name='public'>
                    <option value='Y'
                    <?php if (!isset($esrow['listpublic']) || !$esrow['listpublic'] || $esrow['listpublic'] == "Y") { ?>
                        selected='selected'
                    <?php } ?>
                    ><?php $clang->eT("Yes"); ?></option>
                    
                    <option value='N'
                    <?php if (isset($esrow['listpublic']) && $esrow['listpublic'] == "N") { ?>
                        selected='selected'
                    <?php } ?>
                     ><?php $clang->eT("No"); ?></option>
            </select>
        </li>
        <li>
            <label for='startdate'><?php $clang->eT("Start date/time:"); ?></label>
            <input type='text' class='popupdatetime' id='startdate' size='20' name='startdate' value="<?php echo $startdate; ?>" />
        </li>

            <!--// Expiration date
            $expires='';
        if (trim($esrow['expires']) != '') {
                $items = array($esrow['expires'] , "Y-m-d H:i:s");
                $this->load->library('Date_Time_Converter',$items);
                $datetimeobj = $this->date_time_converter; //new Date_Time_Converter($esrow['expires'] , "Y-m-d H:i:s");
                $expires=$datetimeobj->convert($dateformatdetails['phpdate'].' H:i');
            } -->
        <li>
            <label for='expires'><?php $clang->eT("Expiry date/time:"); ?></label>
            <input type='text' class='popupdatetime' id='expires' size='20' name='expires' value="<?php echo $expires; ?>" />
        </li>

        <li>
            <label for='usecookie'><?php $clang->eT("Prevent repeated participation?"); ?></label>
            <select name='usecookie' id='usecookie'>
                <option value='Y' <?php if ($esrow['usecookie'] == "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("Yes"); ?>
                </option>
                <option value='N' <?php if ($esrow['usecookie'] != "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("No"); ?>
                </option>
             </select>
        </li>
    </ul>

    <h2><?php $clang->eT("Tokens"); ?></h2>
    <input type='hidden' name='anonymized' value='N' />
    <input type='hidden' name='htmlemail' value='Y' />
    <input type='hidden' name='sendconfirmation' value='Y' />
    <input type='hidden' name='tokenlength' value='20' />

    <ul>
        <li>
            <label for='tokenanswerspersistence'><?php $clang->eT("Enable token-based response persistence?"); ?></label>
            <select id='tokenanswerspersistence' name='tokenanswerspersistence' onchange="javascript: if (document.getElementById('anonymized').value == 'Y') { alert('<?php $clang->eT("This option can't be set if the `Anonymized responses` option is active.","js"); ?>'); this.value='N';}">
                <option value='Y'
                    <?php if ($esrow['tokenanswerspersistence'] == "Y") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("Yes"); ?></option>
                <option value='N'
                    <?php if ($esrow['tokenanswerspersistence'] == "N") { ?>
                        selected='selected'
                        <?php } ?>
                    ><?php $clang->eT("No"); ?></option>
            </select>
        </li>
        <li>
            <label for='alloweditaftercompletion' title='<?php $clang->eT("With not anonymous survey: user can update his answer after completion, else user can add new answers without restriction."); ?>'><?php $clang->eT("Allow multiple responses or update responses with one token?"); ?></label>
            <select id='alloweditaftercompletion' name='alloweditaftercompletion'>
                <option value='Y' <?php if ($esrow['alloweditaftercompletion'] == "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("Yes"); ?>
                </option>
                <option value='N' <?php if ($esrow['alloweditaftercompletion'] == "N") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("No"); ?>
                </option>
            </select>
        </li>

        <li><label for='allowregister'><?php $clang->eT("Allow public registration?"); ?></label>
            <select id='allowregister' name='allowregister'>
                <option value='Y' <?php if ($esrow['allowregister'] == "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("Yes"); ?>
                </option>
                <option value='N' <?php if ($esrow['allowregister'] != "Y") { echo "selected='selected'"; } ?>>
                    <?php $clang->eT("No"); ?>
                </option>
            </select>
        </li>
    </ul>
</div>