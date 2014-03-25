<div id='tokens'>
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