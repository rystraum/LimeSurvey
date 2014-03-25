<div id='general'>
    <ul>
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
        
        <li>
            <label for='surveyls_title'><?php $clang->eT("Title"); ?> :</label>
            <input type='text' size='82' maxlength='200' id='surveyls_title' name='surveyls_title' required="required" autofocus="autofocus" />
            <span class='annotation'><?php $clang->eT("Required"); ?> </span>
        </li>
        
        <li>
            <label for='description'><?php $clang->eT("Description:"); ?></label>
            <div class='htmleditor'>
                <textarea cols='80' rows='10' id='description' name='description'></textarea>
                <?php echo getEditor("survey-desc", "description", "[" . $clang->gT("Description:", "js") . "]", '', '', '', $action); ?>
            </div>
        </li>
        
        <li>
            <label for='welcome'><?php $clang->eT("Welcome message:"); ?> </label>
            <div class='htmleditor'>
                <textarea cols='80' rows='10' id='welcome' name='welcome'></textarea>
                <?php echo getEditor("survey-welc", "welcome", "[" . $clang->gT("Welcome message:", "js") . "]", '', '', '', $action) ?>
            </div>
        </li>
        
        <li>
            <label for='endtext'><?php $clang->eT("End message:") ;?> </label>
            <div class='htmleditor'>
                <textarea cols='80' id='endtext' rows='10' name='endtext'></textarea>
                <?php echo getEditor("survey-endtext", "endtext", "[" . $clang->gT("End message:", "js") . "]", '', '', '', $action) ?>
            </div>
        </li>
    </ul>
</div>
