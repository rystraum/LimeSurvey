<ul>
    <li>
        <label for='short_title_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("Survey title"); ?>:</label>
        <input type='text' style="width: 40%" id='short_title_<?php echo $esrow['surveyls_language']; ?>' name='short_title_<?php echo $esrow['surveyls_language']; ?>' value="<?php echo $esrow['surveyls_title']; ?>" />
    </li>
    <li>
        <label for='description_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("Description:"); ?></label>
        <div class='htmleditor'>
            <textarea cols='80' rows='15' id='description_<?php echo $esrow['surveyls_language']; ?>' name='description_<?php echo $esrow['surveyls_language']; ?>'><?php echo $esrow['surveyls_description']; ?></textarea>
        </div>
        <?php echo getEditor("survey-desc","description_".$esrow['surveyls_language'], "[".$clang->gT("Description:", "js")."](".$esrow['surveyls_language'].")",$surveyid,'','',$action); ?>
    </li>
    <li>
        <label for='welcome_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("Welcome message:"); ?></label>
        <div class='htmleditor'>
            <textarea cols='80' rows='15' id='welcome_<?php echo $esrow['surveyls_language']; ?>' name='welcome_<?php echo $esrow['surveyls_language']; ?>'><?php echo $esrow['surveyls_welcometext']; ?></textarea>
        </div>
        <?php echo getEditor("survey-welc","welcome_".$esrow['surveyls_language'], "[".$clang->gT("Welcome:", "js")."](".$esrow['surveyls_language'].")",$surveyid,'','',$action); ?>
    </li>

    <li>
        <label for='endtext_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("End message:"); ?></label>
        <div class='htmleditor'>
            <textarea cols='80' rows='15' id='endtext_<?php echo $esrow['surveyls_language']; ?>' name='endtext_<?php echo $esrow['surveyls_language']; ?>'><?php echo $esrow['surveyls_endtext']; ?></textarea>
        </div>
        <?php echo getEditor("survey-endtext","endtext_".$esrow['surveyls_language'], "[".$clang->gT("End message:", "js")."](".$esrow['surveyls_language'].")",$surveyid,'','',$action); ?>
    </li>

    <?php $end_url = Yii::app()->getConfig('api_url') ?>
    <?php $end_url = $end_url . '?survey_id={SID}&response_id={SAVEDID}&token={TOKEN}&lang={LANG}' ?>
    <li>
        <label for='url_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("End URL:"); ?></label>
        <input type='text' style="width: 40%" maxlength='2000' id='url_<?php echo $esrow['surveyls_language']; ?>' name='url_<?php echo $esrow['surveyls_language']; ?>' value="<?php echo ($esrow['surveyls_url']!="")?$esrow['surveyls_url']:"http://"; ?>" />
    </li>

    <li>
        <label for="custom_url"><?php $clang->eT("Custom URL:") ?></label>
        <input type="text" style="width: 40%" id="custom_url" name="custom_url" value="<?php echo $esrow['custom_url'] ?>" >
    </li>
    <input type='hidden' name='url_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo ($esrow['surveyls_url']!="")? $esrow['surveyls_url'] : "http://" ?>' />
    <input type='hidden' name='urldescrip_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo $esrow['surveyls_urldescription'] ?>' />
    <input type='hidden' name='dateformat_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo $esrow['surveyls_dateformat'] ?>' />
    <input type='hidden' name='numberformat_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo $esrow['surveyls_numberformat'] ?>' />
</ul>