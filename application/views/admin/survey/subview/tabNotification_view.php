<div id='notification'>
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
</div>