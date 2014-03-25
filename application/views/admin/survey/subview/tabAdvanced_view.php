<div id='advanced'>
    <h2>Notifications</h2>
    <input type='hidden' name='datestamp' value='Y' />
    <input type='hidden' name='ipaddr' value='Y' />
    <input type='hidden' name='refurl' value='Y' />
    <input type='hidden' name='savetimings' value='Y' />
    <input type='hidden' name='assements' value='N' />
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

    <h2>Publication</h2>
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

    <h2>Tokens</h2>
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