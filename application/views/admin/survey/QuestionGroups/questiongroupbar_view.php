<div class='menubar' id="question_group_menu">
  <div class='menubar-title ui-widget-header'>
    <a href="<?php echo $this->createUrl("/admin/survey/sa/view/surveyid/".$surveyid."/gid/".$gid) ?>">
      <strong><?php $clang->eT("Question group"); ?></strong>
      <span class='basic'><?php echo $grow['group_name']; ?> (<?php $clang->eT("ID"); ?>:<?php echo $gid; ?>)</span>
    </a>
  </div>
  <ul class="nav nav-pills">
    <?php $multiple_lang = count($languagelist) > 1 ?>
    <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','update')): ?>
      <?php if($multiple_lang): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-fw limegreen fa-eye"></i> <?php $clang->eT("Preview this question group in:") ?>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <?php foreach ($languagelist as $tmp_lang): ?>
              <li>
                <a target="_blank" href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/{$surveyid}/gid/{$gid}/lang/" . $tmp_lang); ?>" >
                  <?php echo getLanguageNameFromCode($tmp_lang,false); ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </li>
      <?php else: ?>
        <li>
          <a id="grouppreviewlink" href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/$surveyid/gid/$gid/"); ?>" target="_blank">
            <i class="fa fa-fw limegreen fa-eye"></i> <?php $clang->eT("Preview current question group") ?>
          </a>
        </li>
      <?php endif ?>

      <li>
        <a href="<?php echo $this->createUrl('admin/questiongroups/sa/edit/surveyid/'.$surveyid.'/gid/'.$gid); ?>">
          <i class="fa fa-fw limegreen fa-edit"></i> <?php $clang->eT("Edit current question group"); ?>
        </a>
      </li>
    <?php endif ?>

    <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','read')): ?>
      <li>
        <a target='_blank' href="<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/{$surveyid}/gid/{$gid}/"); ?>">
          <i class="fa fa-fw limegreen fa-puzzle-piece"></i> <?php $clang->eT("Check survey logic for current question group") ?>
        </a>
      </li>
    <?php endif ?>

    <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','export')): ?>
      <li>
        <a href='<?php echo $this->createUrl("admin/export/sa/group/surveyid/$surveyid/gid/$gid");?>'>
          <i class="fa fa-fw fa-share-square-o limegreen"></i> <?php $clang->eT("Export this question group"); ?>
        </a>
      </li>
    <?php endif ?>

    <?php if (Permission::model()->hasSurveyPermission($surveyid,'surveycontent','delete')): ?>
      <?php if ((($sumcount4 == 0 && $activated != "Y") || $activated != "Y")): ?>
        <li>
          <?php if (is_null($condarray)): ?>
            <?php $msg = $clang->gT("Deleting this group will also delete any questions and answers it contains. Are you sure you want to continue?","js"); ?>
            <?php $url = $this->createUrl("admin/questiongroups/sa/delete/surveyid/$surveyid/gid/$gid"); ?>
            <a href='#' onclick="if (confirm('<?php echo $msg ?>')) { window.open('<?php echo $url ?>','_top'); }">
              <i class="fa fa-fw limegreen fa-trash-o"></i> <?php $clang->eT("Delete current question group"); ?>
            </a>
          <?php else: // TMSW Condition->Relevance:  Should be allowed to delete group even if there are conditions/relevance, since separate view will show exceptions ?>
            <a href='<?php echo $this->createUrl("admin/survey/sa/view/surveyid/$surveyid/gid/$gid"); ?>' onclick="alert('<?php $clang->eT("Impossible to delete this group because there is at least one question having a condition on its content","js"); ?>'); return false;">
              <img src='<?php echo $imageurl; ?>delete_disabled.png' alt='<?php $clang->eT("Delete current question group"); ?>' width="<?php echo $iIconSize;?>" height="<?php echo $iIconSize;?>"/>
            </a>
          <?php endif ?>
        </li>
      <?php endif ?>
    <?php endif ?>
    
    <?php if ($activated == "Y"): ?>
      <li class="pull-right disabled">
        <a href='#'>
          <?php echo $clang->gT("Disabled").' - '.$clang->gT("This survey is currently active."); ?>
        </a>
      </li>
    <?php elseif(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','create')): ?>
      <li class="pull-right active">
        <a href='<?php echo $this->createUrl("admin/questions/sa/addquestion/surveyid/".$surveyid."/gid/".$gid); ?>'>
          <i class="fa limegreen fa-plus-circle"></i> <?php $clang->eT("Add new question to group") ?>
        </a>
      </li>
    <?php endif ?>

    <li class="pull-right navbar-search">
      <select class="listboxquestions" name='questionid' id='questionid' onchange="window.open(this.options[this.selectedIndex].value, '_top')">
        <?php echo getQuestions($surveyid,$gid,$qid); ?>
      </select>
    </li>
  </ul>

  <?php $questions = get_raw_questions($surveyid, $gid) ?>
  <?php // print_r($questions) ?>
  <?php $types = getQuestionTypeList("T", "array"); ?>
  <?php // if((isset($copying) && !$copying) && (isset($adding) && !$adding)): ?>
  <?php if(empty($qid)): ?>
    <div id="question_group_details">
      <h4>Question Group Details</h4>
      <dl>
        <dt>ID</dt>
        <dd><?php echo $grow['gid'] ?></dd>
        <dt><?php $clang->eT("Title") ?></dt>
        <dd><?php echo $grow['group_name'] ?></dd>
        <dt><?php $clang->eT("Description:"); ?></dt>
        <dd>
          <?php if (trim($grow['description'])!='') {
            templatereplace($grow['description']);
            echo LimeExpressionManager::GetLastPrettyPrintExpression();
          } ?>
        </dd>

        <?php if (trim($grow['grelevance'])!==''): ?>
          <dt><?php $clang->eT("Relevance:"); ?></dt>
          <dd>
            <?php
              templatereplace('{' . $grow['grelevance'] . '}');
              echo LimeExpressionManager::GetLastPrettyPrintExpression();
            ?>
          </dd>
        <?php endif ?>

        <?php if (trim($grow['randomization_group'])!=''): ?>
          <dt><?php $clang->eT("Randomization group:") ?></dt>
          <dd><?php echo $grow['randomization_group'] ?></dd>
        <?php endif ?>

        <?php // TMSW Condition->Relevance:  Use relevance equation or different EM query to show dependencies ?>

        <?php if (!is_null($condarray)): ?>
          <dt><?php $clang->eT("Questions with conditions to this group"); ?></dt>
          <?php foreach ($condarray[$gid] as $depgid => $deprow): ?>
            <?php foreach ($deprow['conditions'] as $depqid => $depcid): ?>
              <?php $listcid = implode("-",$depcid) ?>
              <dd>
                <a href='<?php echo $this->createUrl("admin/conditions/sa/index/subaction/conditions/surveyid/$surveyid/gid/$depgid/qid/$depqid",array('markcid'=>implode("-",$depcid))); ?>'>
                  [QID: <?php echo $depqid; ?>]
                </a>
              </dd>
            <?php endforeach ?>
          <?php endforeach ?>
        <?php endif ?>
      </dl>
    </div>

    <div id="questions-table">
      <h4><?php $clang->eT("Questions:") ?></h4>
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($questions as $question): ?>
            <tr>
              <td>
                <a href="<?php echo $question['url'] ?>">
                  [<?php echo $question['question_order'] ?>] <?php echo $question['title'] ?>: <?php echo $question['question'] ?>
                </a>
              </td>
              <td><?php echo $types[$question['type']]['description'] ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  <?php endif ?>