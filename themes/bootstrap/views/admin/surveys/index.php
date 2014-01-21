<p style="display: none;">This file in themes/bootstrap/views/admin/survey/index.php</p>
<?php $clang = $this->lang; ?>
<table class="table">
  <thead>
    <tr>
      <th>Status</th>
      <th>ID</th>
      <th>Name</th>
      <th>Date created</th>
      <th>Owner</th>
      <th>Access</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php Yii::import('application.libraries.Date_Time_Converter', true) ?>
    <?php $dateformatdetails = getDateFormatData(Yii::app()->session['dateformat']) ?>
    <?php foreach ($surveys as $survey): ?>
      <?php $datetimeobj = new Date_Time_Converter($survey->datecreated, "Y-m-d H:i:s") ?>
      <?php $date_created = $datetimeobj->convert($dateformatdetails['phpdate']) ?>
      <?php $status_message = survey_status($survey, $clang) // find in common_helper.php ?>
      <?php $status_icon = survey_status_icon($status_message) ?>
      <tr>
        <td class="status">
          <span class="<?php echo $status_icon ?>" alt="<?php echo $status_message['message'] ?>"></span>
        </td>
        <td class="id"><?php echo $survey->sid ?></td>
        <td class="name">
          <?php echo $survey->defaultlanguage->attributes['surveyls_title'] ?>
        </td>
        <td class="date_created"><?php echo $date_created ?></td>
        
        <td class="owner">
          <?php if (isset($survey->owner->attributes)): ?>
            <?php echo $survey->owner->users_name ?>
          <?php else: ?>
            None
          <?php endif; ?>
        </td>
        
        <td class="access">
          <?php if(tableExists('tokens_' . $survey['sid'] )): ?>
            <?php echo $clang->gT('Closed'); ?>
          <?php else: ?>
            <?php echo $clang->gT('Open'); ?>
          <?php endif; ?>
        </td>
        
        <td class="actions">
          <a class="btn btn-primary btn-sm" href="<?php echo $this->createUrl("admin/survey/sa/view/surveyid/" . $survey->sid) ?>">Show</a>
          
          <?php if(Permission::model()->hasGlobalPermission('superadmin','read') || Yii::app()->session->loginID == $survey->owner_id): ?>
            <a class="btn btn-default btn-sm" href="#">Edit</a>
          <?php endif; ?>

          <?php if ($status_message['status'] === 'c'): ?>
            <a class="btn btn-danger btn-sm" href="<?php echo $this->createUrl('admin/survey/sa/deactivate/surveyid/' . $survey->sid) ?>">Deactivate</a>
          <?php endif; ?>

          <?php if ($status_message['status'] === 'e'): ?>
            <a class="btn btn-success btn-sm" href="<?php echo $this->createUrl('admin/survey/sa/activate/surveyid/' . $survey->sid) ?>">Activate</a>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<!-- <pre><?php var_dump($surveys); ?></pre> -->
