<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <?php echo $surveyinfo['surveyls_title'] ?> 
      <span class="label label-default">
        <?php echo $clang->gT("ID").": ".$surveyid; ?>
      </span>
    </h3>
  </div>
  <div class="panel-body">
    <div class="btn-group-vertical">
      <?php if($activated || $surveycontent): ?>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Test Survey <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <?php if($onelanguage): ?>
              <li>
                <a accesskey='d' target='_blank' href="<?php echo $this->createUrl("survey/index/sid/$surveyid/newtest/Y/lang/$baselang"); ?>" >
                  <?php echo getLanguageNameFromCode($baselang, false) ?>
                </a>
              </li>
            <?php else: ?>
              <li>
                <a accesskey='d' target='_blank' href="<?php echo $this->createUrl("survey/index/sid/$surveyid/newtest/Y/lang/$baselang"); ?>" >
                  <img src='<?php echo $sImageURL;?>do.png' alt='<?php echo $icontext;?>' />
                </a>
              </li>
              
              <?php foreach ($languagelist as $tmp_lang): ?>
                <li>
                  <a accesskey='d' target='_blank' href='<?php echo $this->createUrl("survey/index/sid/$surveyid/newtest/Y/lang/$tmp_lang");?>'>
                    <?php echo getLanguageNameFromCode($tmp_lang, false) ?>
                  </a>
                </li>
              <?php endforeach ?>
            <?php endif ?>
          </ul>
        </div>
      <?php endif ?>

      <?php if( $activated && ($respstatsread || $responsescreate || $responsesread)): ?>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Responses <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li>
              <?php if($respstatsread): ?>
                <a href='<?php echo $this->createUrl("admin/responses/sa/index/surveyid/$surveyid/");?>' >
                  <?php $clang->eT("See responses & statistics") ?>
                </a>
              <?php endif ?>
            </li>
            <li class="divider"></li>
            <li>
              <?php if($responsescreate): ?>
                <a href='<?php echo $this->createUrl("admin/dataentry/sa/view/surveyid/$surveyid") ?>' >
                  <?php $clang->eT("Data entry screen") ?>
                </a>
              <?php endif ?>
            </li>
            <li class="divider"></li>
            <li>
              <?php if($responsesread): ?>
                <a href='<?php echo $this->createUrl("admin/saved/sa/view/surveyid/$surveyid") ?>' >
                  <?php $clang->eT("Partial (saved) responses") ?>
                </a>
              <?php endif ?>
            </li>
          </ul>
        </div>
      <?php endif ?>

      <?php if($surveylocale || $surveysettings || $surveysecurity || $quotas || $assessments || $surveycontent): ?>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <?php $clang->eT("Survey properties") ?><span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <?php if($surveylocale): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/survey/sa/editlocalsettings/surveyid/$surveyid");?>'>
                  <?php $clang->eT("Edit text elements") ?>
                </a>
              </li>
            <?php endif ?>

            <?php if($surveysettings): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/survey/sa/editsurveysettings/surveyid/$surveyid");?>' >
                  <?php $clang->eT("General settings") ?>
                </a>
              </li>
            <?php endif ?>

            <?php if($surveysecurity): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/surveypermission/sa/view/surveyid/$surveyid");?>' >
                  <?php $clang->eT("Survey permissions") ?>
                </a>
              </li>
            <?php endif ?>

            <?php if($quotas): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/quotas/sa/index/surveyid/$surveyid/");?>' >
                  <?php $clang->eT("Quotas") ?>
                </a>
              </li>
            <?php endif ?>

            <?php if($assessments): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/assessments/sa/index/surveyid/$surveyid");?>' >
                  <?php $clang->eT("Assessments") ?>
                </a>
              </li>
            <?php endif ?>

            <?php if($surveylocale): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/emailtemplates/sa/index/surveyid/$surveyid");?>' >
                  <?php $clang->eT("Email templates") ?>
                </a>
              </li>
            <?php endif ?>
          </ul>
        </div>

        <?php if($surveycontent): ?>
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <?php $clang->eT("Survey logic file") ?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <?php if($onelanguage): ?>
                <li>
                  <a target='_blank' href='<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/$surveyid/");?>' >
                    <?php echo getLanguageNameFromCode($baselang, false) ?>
                  </a>
                </li>
              <?php else: ?>
                <?php foreach ($languagelist as $tmp_lang): ?>
                  <li>
                    <a accesskey='d' target='_blank' href='<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/$surveyid/lang/$tmp_lang");?>'>
                      <img src='<?php echo $sImageURL;?>quality_assurance.png' alt='' /> 
                      <?php echo getLanguageNameFromCode($tmp_lang,false);?>
                    </a>
                  </li>
                <?php endforeach ?> 
              <?php endif ?>
            </ul>
          </div>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
  <table class="table table-condensed">
    <tbody>
      <tr>
        <th>Status</th>
        <td>
          <?php 
            if(!$activated) {
              $clang->eT("This survey is currently not active.");
            } else {
              if($expired) {
                $clang->eT("This survey is active but expired.");
              } elseif($notstarted) {
                $clang->eT("This survey is active but has a start date.");
              } else {
                $clang->eT("This survey is currently active.");
              }
            } 
          ?>
        </td>
      </tr>
      <tr>
        <th></th>
        <td>
          <?php 
            if(!$activated) {
              if($canactivate) {
                $url = $this->createUrl("admin/survey/sa/activate/surveyid/$surveyid");
                $text = $clang->gT("Activate this Survey");
                echo "<a href='$url' class='btn btn-primary btn-sm'>$text</a>";
              } else {
                $clang->eT("Survey cannot be activated. Either you have no permission or there are no questions.");
              }
            } else {
              $url = $this->createUrl("admin/survey/sa/deactivate/surveyid/$surveyid");
              $text = $clang->gT("Stop this survey");
              echo "<a href='$url' class='btn btn-danger btn-sm'>$text</a>";
            }
          ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>