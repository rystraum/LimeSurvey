<?php
    if ((isset($failedcheck) && $failedcheck) || (isset($failedgroupcheck) && $failedgroupcheck))
    { ?>
    <div class='messagebox ui-corner-all'>
        <div class='header ui-widget-header'><?php $clang->eT("Activate Survey"); echo "($surveyid)"; ?></div>
        <div class='warningheader'><?php $clang->eT("Error"); ?><br />
        <?php $clang->eT("Survey does not pass consistency check"); ?></div>
        <p>
        <strong><?php $clang->eT("The following problems have been found:"); ?></strong><br />
        <ul>
            <?php if (isset($failedcheck) && $failedcheck)
                {
                    foreach ($failedcheck as $fc)
                    { ?>
                    <li> Question qid-<?php echo $fc[0]; ?> ("<a href='<?php echo Yii::app()->getController()->createUrl('admin/survey/sa/view/surveyid/'.$surveyid.'/gid/'.$fc[3].'/qid/'.$fc[0]); ?>'><?php echo $fc[1]; ?></a>")<?php echo $fc[2]; ?></li>
                    <?php }
                }
                if (isset($failedgroupcheck) && $failedgroupcheck)
                {
                    foreach ($failedgroupcheck as $fg)
                    { ?>
                    <li> Group gid-<?php echo $fg[0]; ?> ("<a href='<?php echo Yii::app()->getController()->createUrl('admin/survey/sa/view/surveyid/'.$surveyid.'/gid/'.$fg[0]); ?>'><?php echo $fg[1]; ?></a>")<?php echo $fg[2]; ?></li>
                    <?php }
            } ?>
        </ul>
        <?php $clang->eT("The survey cannot be activated until these problems have been resolved."); ?>
    </div><br />&nbsp;


    <?php }
    else
    { ?>

    <br /><div class='messagebox ui-corner-all'>
        <div class='header ui-widget-header'><?php $clang->eT("Activate Survey"); echo "($surveyid)" ;?></div>
        <div class='warningheader'>
            <?php $clang->eT("Warning"); ?><br />
            <?php $clang->eT("READ THIS CAREFULLY BEFORE PROCEEDING"); ?>
        </div>
        <?php $clang->eT("You should only activate a survey when you are absolutely certain that your survey setup is finished and will not need changing."); ?><br /><br />
        <?php $clang->eT("Once a survey is activated you can no longer:"); ?><ul><li><?php $clang->eT("Add or delete groups"); ?></li><li><?php $clang->eT("Add or delete questions"); ?></li><li><?php $clang->eT("Add or delete subquestions or change their codes"); ?></li></ul>
        
        <?php echo CHtml::form(array("admin/survey/sa/activate/surveyid/{$surveyid}/"), 'post', array('class'=>'form44')); ?>
            <input type='hidden' name='anonymized' value='N' />
            <input type='hidden' name='datestamp' value='Y' />
            <input type='hidden' name='ipaddr' value='Y' />
            <input type='hidden' name='refurl' value='Y' />
            <input type='hidden' name='savetimings' value='Y' />

            <?php $clang->eT("Please note that once responses have collected with this survey and you want to add or remove groups/questions or change one of the settings above, you will need to deactivate this survey, which will move all data that has already been entered into a separate archived table."); ?><br /><br />
            <input type='hidden' name='ok' value='Y' />
            <input type='submit' class="btn btn-primary" value="<?php $clang->eT("Save / Activate survey"); ?>" />
        </form>
    </div><br />&nbsp;
    <?php } ?>