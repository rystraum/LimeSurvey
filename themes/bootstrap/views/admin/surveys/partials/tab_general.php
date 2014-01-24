<div id='general' class='tab-pane active'>
  <div class="form-group">
    <label for='language' title='<?php $clang->eT("This is the base language of your survey and it can't be changed later. You can add more languages after you have created the survey."); ?>'>
      <span class='annotationasterisk'>*</span>
      <?php $clang->eT("Base language:"); ?>
    </label>
    <select id='language' name='language' class='form-control'>
      <?php foreach (getLanguageDataRestricted (false, Yii::app()->session['adminlang']) as $langkey2 => $langname): ?>
        <?php 
          $selected = '';
          if (Yii::app()->getConfig('defaultlang') == $langkey2) { 
            $selected = "selected='selected'";
          }
        ?>
        <option value='<?php echo $langkey2; ?>' <?php echo $selected ?>>
          <?php echo $langname['description']; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <span class='help-block'><?php $clang->eT("*This setting cannot be changed later!"); ?></span>
  </div>

  <div class='form-group'>
    <label for='surveyls_title'><?php $clang->eT("Title"); ?> :</label>
    <input class='form-control' type='text' size='82' maxlength='200' id='surveyls_title' name='surveyls_title' required="required" autofocus="autofocus" />
    <span class='annotation help-block'><?php $clang->eT("Required"); ?></span>
  </div>

  <div class='form-group'>
    <label for='description'><?php $clang->eT("Description:"); ?> </label>
    <textarea class='form-control' cols='80' rows='10' id='description' name='description'></textarea>
  </div>

  <div class='form-group'>
    <label for='welcome'><?php $clang->eT("Welcome message:"); ?></label>
    <textarea class='form-control' cols='80' rows='10' id='welcome' name='welcome'></textarea>
  </div>

  <div class='form-group'>
    <label for='endtext'><?php $clang->eT("End message:") ;?> </label>
    <textarea class='form-control' cols='80' id='endtext' rows='10' name='endtext'></textarea>
  </div>

  <div class='form-group'>
    <label for='url'><?php $clang->eT("End URL:"); ?></label>
    <input class='form-control' type='text' size='50' id='url' name='url' value='http://' />
  </div>

  <div class='form-group'>
    <label for='urldescrip'><?php $clang->eT("URL description:") ; ?></label>
    <input class='form-control' type='text' maxlength='255' size='50' id='urldescrip' name='urldescrip' value='' />
  </div>

  <div class='form-group'>
    <label for='dateformat'><?php $clang->eT("Date format:") ; ?></label>
    <?php
      echo CHtml::listBox('dateformat',$sDateFormatDefault, $aDateFormatData, array('id'=>'dateformat','size'=>'1', 'class' => 'form-control'));
    ?>
  </div>

  <div class='form-group'>
    <label for='numberformat'><?php $clang->eT("Decimal mark:"); ?></label>
    <?php
      echo CHtml::listBox('numberformat',$sRadixDefault, $aRadixPointData, array('id'=>'numberformat','size'=>'1', 'class' => 'form-control'));
    ?>
  </div>

  <div class='form-group'>
    <label for='admin'><?php $clang->eT("Administrator:") ; ?></label>
    <input class='form-control' type='text' size='50' id='admin' name='admin' value='<?php echo $owner['full_name'] ; ?>' />
  </div>

  <div class='form-group'>
    <label for='adminemail'><?php $clang->eT("Admin email:") ; ?></label>
    <input class='form-control' type='email' size='50' id='adminemail' name='adminemail' value='<?php echo $owner['email'] ; ?>' />
  </div>

  <div class='form-group'>
    <label for='bounce_email'><?php $clang->eT("Bounce Email:") ; ?></label>
    <input class='form-control' type='email' size='50' id='bounce_email' name='bounce_email' value='<?php echo $owner['bounce_email'] ; ?>' />
  </div>

  <div class='form-group'>
    <label for='faxto'><?php $clang->eT("Fax to:") ; ?></label>
    <input class='form-control' type='text' size='50' id='faxto' name='faxto' />
  </div>
</div>
