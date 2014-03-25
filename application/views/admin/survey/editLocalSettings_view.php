<ul>
    <li><label for='short_title_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("Survey title"); ?>:</label>
        <input type='text' size='80' id='short_title_<?php echo $esrow['surveyls_language']; ?>' name='short_title_<?php echo $esrow['surveyls_language']; ?>' value="<?php echo $esrow['surveyls_title']; ?>" />
    </li>
    <li><label for='description_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("Description:"); ?></label>
        <div class='htmleditor'>
        <textarea cols='80' rows='15' id='description_<?php echo $esrow['surveyls_language']; ?>' name='description_<?php echo $esrow['surveyls_language']; ?>'><?php echo $esrow['surveyls_description']; ?></textarea>
        </div>
        <?php echo getEditor("survey-desc","description_".$esrow['surveyls_language'], "[".$clang->gT("Description:", "js")."](".$esrow['surveyls_language'].")",$surveyid,'','',$action); ?>
    </li>
    <li><label for='welcome_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("Welcome message:"); ?></label>
        <div class='htmleditor'>
        <textarea cols='80' rows='15' id='welcome_<?php echo $esrow['surveyls_language']; ?>' name='welcome_<?php echo $esrow['surveyls_language']; ?>'><?php echo $esrow['surveyls_welcometext']; ?></textarea>
         </div>
        <?php echo getEditor("survey-welc","welcome_".$esrow['surveyls_language'], "[".$clang->gT("Welcome:", "js")."](".$esrow['surveyls_language'].")",$surveyid,'','',$action); ?>
    </li>
    <li><label for='endtext_<?php echo $esrow['surveyls_language']; ?>'><?php $clang->eT("End message:"); ?></label>
        <div class='htmleditor'>
        <textarea cols='80' rows='15' id='endtext_<?php echo $esrow['surveyls_language']; ?>' name='endtext_<?php echo $esrow['surveyls_language']; ?>'><?php echo $esrow['surveyls_endtext']; ?></textarea>
        </div>
        <?php echo getEditor("survey-endtext","endtext_".$esrow['surveyls_language'], "[".$clang->gT("End message:", "js")."](".$esrow['surveyls_language'].")",$surveyid,'','',$action); ?>
    </li>
    <input type='hidden' name='url_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo ($esrow['surveyls_url']!="")? $esrow['surveyls_url'] : "http://" ?>' />
    <input type='hidden' name='urldescrip_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo $esrow['surveyls_urldescription'] ?>' />
    <input type='hidden' name='dateformat_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo $esrow['surveyls_dateformat'] ?>' />
    <input type='hidden' name='numberformat_<?php echo $esrow['surveyls_language'] ?>' value='<?php echo $esrow['surveyls_numberformat'] ?>' />
</ul>