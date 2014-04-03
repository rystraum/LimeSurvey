<script type="text/javascript">
  var expanded = false;
  $(document).ready(function(){
    var toggle_hide = function() {
      var $target = $(this);
      $target.nextUntil('li.divider').slideToggle();
      $('i', $target).toggleClass('fa-toggle-down fa-toggle-up');
    }

    var toggle_expand = function() {
      var $target = $(this);
      $target.toggleClass('fa-caret-square-o-left fa-caret-square-o-right');
      $("#sidebar a span, #sidebar .nav-header, #question_groups .nav").toggle();
      $("#sidebar dt:not(:first-child)").toggle();
      $("#sidebar dd:last-child").toggle()
      $("#main-content").toggleClass('span11 span10');
      $("#sidebar i").toggleClass('fa-2x');

      if (expanded) {
        $("#sidebar .btn").attr('style', 'width: 80%');
        $("#sidebar img").attr('style', 'width: auto; max-width: 16px');
      } else {
        $("#sidebar .btn").attr('style', 'width: auto');
        $("#sidebar img").attr('style', 'width: 34px; max-width: none');
      }

      expanded = !expanded;
    }

    var icon = $('<i class="fa fa-toggle-up fa-lg fa-fw pull-right"></i>');
    $('.hideable').append(icon);
    $('.hideable').click(toggle_hide);
    $('.hidden-hideable').click();
    $('.expandable').click(toggle_expand);
  });
</script>
<div class="row-fluid">
  <div id="sidebar">
    <i class="fa fa-lg fa-fw fa-caret-square-o-left expandable pull-right"></i>
    <div class="clearfix"></div>
    <div id="sidebar-inner">
      <div class="panel">
        <dl>
          <dt class="pull-left">
            <a href="<?php echo $this->createUrl("admin/survey/sa/view/surveyid/$surveyid") ?>">
              <?php echo $surveyinfo['surveyls_title'] ?>
              <span>(<?php $clang->eT("ID") ?>:<?php echo $surveyid ?>)</span>
            </a>
          </dt>
          <dd class="clearfix"></dd>
          <dt class="pull-left">Status</dt>
          <dd class="status pull-right">
            <?php if(!$activated): ?>
              <?php // $clang->eT("This survey is currently not active") ?>
              <span class="label label-important">Inactive</span>
            <?php else: ?>
              <?php if($expired): ?>
                <span class="label label-warning">Expired</span>
                <?php // $clang->eT("This survey is active but expired.") ?>
              <?php elseif($notstarted): ?>
                <?php // $clang->eT("This survey is active but has a start date.") ?>
                <span class="label label-info">Starting</span>
              <?php else: ?>
                <?php // $clang->eT("This survey is currently active.") ?>
                <span class="label label-success">Active</span>
              <?php endif ?>
            <?php endif ?>
          </dd>
          <dt class="clearfix"></dt>
          <dt class="pull-left">Responses</dt>
          <dd class="pull-right">
            <?php if($activated): ?>
              <?php if($respstatsread || $responsescreate || $responsesread): ?>
                <a href='<?php echo $this->createUrl("admin/responses/sa/index/surveyid/$surveyid/") ?>' >
                  <?php echo $responses_count['cntall'] ?> responses
                  <i class="fa fa-fw fa-sign-in"></i>
                </a>
              <?php else: ?>
                You do not have permission to view responses.
              <?php endif ?>
            <?php else: ?>
              Available when activated.
            <?php endif ?>
          </dd>
        </dl>
        <div class="clearfix"></div>
      </div>

      <?php if($permission): ?>
        <div class="well" id="question_groups">
          <ul class="nav nav-list">
            <li class="nav-header"><?php $clang->eT("Question groups") ?></li>
            <?php if($raw_groups): ?>
              <?php foreach($raw_groups as $group): ?>
                <li><a href="<?php echo $group['link'] ?>"><?php echo $group['group_name'] ?></a></li>
              <?php endforeach ?>
            <?php else: ?>
              <li class="nav-header">No groups</li>
            <?php endif ?>
          </ul>

          <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','create') && !$activated): ?>
            <a href="<?php echo $this->createUrl("admin/questiongroups/sa/add/surveyid/$surveyid") ?>" class="btn btn-primary btn-small">
              <i class="fa limegreen fa-plus-circle"></i>
              <span><?php $clang->eT("Add new group to survey") ?></span>
            </a>
          <?php endif ?>
        </div>
      <?php endif ?>

      <div class="well">
        <ul class="nav nav-list">
          <li class="nav-header hideable">Actions</li>
          <?php if($canactivate): ?>
            <li>
              <?php if($activated): ?>
                <a href="<?php echo $this->createUrl("admin/survey/sa/deactivate/surveyid/$surveyid"); ?>">
                  <i class="fa fa-exclamation red fa-fw"></i> <?php $clang->eT("Stop this survey") ?>
                </a>
              <?php else: ?>
                <a href="<?php echo $this->createUrl("admin/survey/sa/activate/surveyid/$surveyid"); ?>">
                  <i class="fa fa-rocket fa-fw primary-blue"></i>
                  <span><?php $clang->eT("Activate this Survey") ?></span>
                </a>
              <?php endif ?>        
            </li>
          <?php else: ?>
            <li><a href="#" class="red"><?php $clang->eT("Survey cannot be activated. Either you have no permission or there are no questions.") ?></a></li>
          <?php endif ?>

          <?php if($activated || $surveycontent): ?>
            <?php if($onelanguage): ?>
              <li>
                <a accesskey='d' target='_blank' href="<?php echo $this->createUrl("survey/index/sid/$surveyid/newtest/Y/lang/$baselang"); ?>" >
                  <i class="fa fa-gear fa-fw limegreen"></i> <span><?php echo $icontext ?></span>
                </a>
              </li>
            <?php else: ?>
                <li>
                  <a accesskey='d' target='_blank' href="<?php echo $this->createUrl("survey/index/sid/$surveyid/newtest/Y/lang/$baselang"); ?>" >
                    <img src='<?php echo $sImageURL ?>do_30.png' alt=''/> <span><?php echo $icontext; ?></span>
                  </a>
                </li>
                <?php foreach ($languagelist as $tmp_lang): ?>
                  <li>
                    <a accesskey='d' target='_blank' href='<?php echo $this->createUrl("survey/index/sid/$surveyid/newtest/Y/lang/$tmp_lang") ?>'>
                      <img src='<?php echo $sImageURL ?>do_30.png' alt=''/> <span><?php echo getLanguageNameFromCode($tmp_lang,false) ?></span>
                    </a>
                  </li>
                <?php endforeach ?>
            <?php endif ?>
          <?php endif ?>

          <?php if($surveycontent && !$activated): ?>
            <li>
              <a href="<?php echo $this->createUrl("admin/survey/sa/organize/surveyid/$surveyid") ?>">
                <i class="fa fa-random limegreen fa-fw"></i> <span><?php $clang->eT("Reorder question groups / questions") ?></span>
              </a>
            </li>
          <?php endif ?>

          <?php if($tokenmanagement): ?>
            <li>
              <a href="<?php echo $this->createUrl("admin/tokens/sa/index/surveyid/$surveyid"); ?>">
                <i class="fa fa-group limegreen fa-fw"></i> <span><?php $clang->eT("Token management") ?></span>
              </a>
            </li>
          <?php endif ?>

          <?php if ($surveydelete): ?>
            <li>
              <a href="<?php echo $this->createUrl("admin/survey/sa/delete/surveyid/{$surveyid}"); ?>">
                <i class="fa fa-trash-o fa-fw red"></i> <span><?php $clang->eT("Delete survey") ?></span>
              </a>
            </li>
          <?php endif ?>

          <?php if(false && $activated && ($respstatsread || $responsescreate || $responsesread)): ?>
            <li class="divider"></li>
            <li class="nav-header hideable"><?php $clang->eT("Responses") ?></li>
            <?php if($respstatsread): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/responses/sa/index/surveyid/$surveyid/") ?>' >
                  <img src='<?php echo $sImageURL ?>browse_30.png' alt='' /> <span><?php $clang->eT("Responses & statistics") ?></span>
                </a>
              </li>
            <?php endif ?>
            
            <?php if($responsescreate): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/dataentry/sa/view/surveyid/$surveyid") ?>' >
                  <img src='<?php echo $sImageURL ?>dataentry_30.png' alt='' /> <span><?php $clang->eT("Data entry screen") ?></span>
                </a>
              </li>
            <?php endif ?>
            
            <?php if($responsesread): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/saved/sa/view/surveyid/$surveyid") ?>' >
                  <img src='<?php echo $sImageURL ?>saved_30.png' alt='' /> <span><?php $clang->eT("Partial (saved) responses") ?></span>
                </a>
              </li>
            <?php endif ?>
          <?php endif ?> 

          <li class="divider"></li>

          <li class="nav-header hideable"><?php $clang->eT("Survey properties") ?></li>
          <?php if($surveylocale) { ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/survey/sa/editlocalsettings/surveyid/$surveyid") ?>'>
                <i class="fa fa-edit limegreen fa-fw"></i> <span><?php $clang->eT("Edit text elements") ?></span>
              </a>
            </li>
          <?php } ?>   

          <?php if($surveysettings) { ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/survey/sa/editsurveysettings/surveyid/$surveyid") ?>' >
                <i class="fa fa-tasks limegreen fa-fw"></i> <span><?php $clang->eT("General settings") ?></span>
              </a>
            </li>
          <?php } ?>

          <?php if($surveysecurity) { ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/surveypermission/sa/view/surveyid/$surveyid") ?>' >
                <i class="fa fa-lock limegreen fa-fw"></i> <span><?php $clang->eT("Survey permissions") ?></span>
              </a>
            </li>
          <?php } ?>

          <?php if(false) { // if($quotas) { ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/quotas/sa/index/surveyid/$surveyid/") ?>' >
                <img src='<?php echo $sImageURL ?>quota_30.png' alt=''/> <span><?php $clang->eT("Quotas") ?></span>
              </a>
            </li>
          <?php } ?>
          
          <?php if(false) { // if($assessments) { ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/assessments/sa/index/surveyid/$surveyid") ?>' >
                <img src='<?php echo $sImageURL ?>assessments_30.png' alt=''/> <span><?php $clang->eT("Assessments") ?></span>
              </a>
            </li>
          <?php } ?>
          
          <?php if(false) { // if($surveycontent) { ?>
            <?php if($onelanguage) { ?>
              <li>
                <a target='_blank' href='<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/$surveyid/") ?>' >
                  <img src='<?php echo $sImageURL ?>quality_assurance_30.png' alt='' /> <span><?php $clang->eT("Survey logic file") ?></span>
                </a>
              </li>
            <?php } else { ?>
              <li>
                <a target='_blank' href='<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/$surveyid/") ?>' >
                  <img src='<?php echo $sImageURL ?>quality_assurance_30.png' alt='' /> <span><?php $clang->eT("Survey logic file") ?></span>
                </a>
                <ul class="nav nav-list">
                  <li class="nav-header"> Other languages</li>
                  <?php foreach ($languagelist as $tmp_lang) { ?>
                      <li>
                        <a accesskey='d' target='_blank' href='<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/$surveyid/lang/$tmp_lang") ?>'>
                          <img src='<?php echo $sImageURL ?>quality_assurance.png' alt='' />
                          <span><?php echo getLanguageNameFromCode($tmp_lang,false) ?></span>
                        </a>
                      </li>
                  <?php } ?>
                </ul>
              </li>
            <?php } ?>
          <?php } ?>

          <li class="divider"></li>

          <li class="nav-header hideable hidden-hideable"><?php $clang->eT("Tools") ?></li>

          <?php if($surveylocale) { ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/emailtemplates/sa/index/surveyid/$surveyid") ?>' >
                <img src='<?php echo $sImageURL ?>emailtemplates_30.png' alt=''/> <span><?php $clang->eT("Email templates") ?></span>
              </a>
            </li>
          <?php } ?>

          <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','read')): ?>
            <?php if($onelanguage): ?>
              <li>
                <a target='_blank' href='<?php echo $this->createUrl("admin/printablesurvey/sa/index/surveyid/$surveyid") ?>' >
                  <img src='<?php echo $sImageURL ?>print_30.png' alt='' /> <span><?php $clang->eT("Printable version") ?></span>
                </a>
              </li>
            <?php else: ?>
              <li>
                <a target='_blank' href='<?php echo $this->createUrl("admin/printablesurvey/sa/index/surveyid/$surveyid") ?>' >
                  <img src='<?php echo $sImageURL ?>print_30.png' alt='' /> <span><?php $clang->eT("Printable version") ?></span>
                </a>
                <ul class="nav nav-list">
                  <?php foreach ($languagelist as $tmp_lang): ?>
                    <li>
                      <a accesskey='d' target='_blank' href='<?php echo $this->createUrl("admin/printablesurvey/sa/index/surveyid/$surveyid/lang/$tmp_lang") ?>'>
                        <img src='<?php echo $sImageURL ?>print_30.png' alt='' /> <span><?php echo getLanguageNameFromCode($tmp_lang,false) ?></span>
                      </a>
                    </li>
                  <?php endforeach ?>
                </ul>
              </li>
            <?php endif ?>
          <?php endif ?>

          <?php if($surveyexport): ?>
            <?php if($onelanguage): ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/export/sa/showquexmlsurvey/surveyid/$surveyid") ?>' >
                  <img src='<?php echo $sImageURL ?>export_30.png' alt='' /> <span><?php $clang->eT("QueXML export") ?></span>
                </a>
              </li>
            <?php else: ?>
              <li>
                <a href='<?php echo $this->createUrl("admin/export/sa/showquexmlsurvey/surveyid/$surveyid") ?>' >
                  <img src='<?php echo $sImageURL ?>export_30.png' alt='' /> <span><?php $clang->eT("QueXML export") ?></span>
                </a>
                <ul>
                  <?php foreach ($languagelist as $tmp_lang): ?>
                    <li>
                      <a accesskey='d' target='_blank' href='<?php echo $this->createUrl("admin/export/sa/showquexmlsurvey/surveyid/$surveyid/lang/$tmp_lang") ?>'>
                        <img src='<?php echo $sImageURL ?>export_30.png' alt=''/> <span><?php echo getLanguageNameFromCode($tmp_lang,false) ?></span>
                      </a>
                      </li>
                  <?php endforeach ?>
                </ul>
              </li>
            <?php endif ?>
          <?php endif ?>
          
          <?php if ($surveytranslate): ?>
            <?php if($hasadditionallanguages) { ?>
              <li>
                <a href="<?php echo $this->createUrl("admin/translate/sa/index/surveyid/{$surveyid}") ?>">
                  <img src='<?php echo $sImageURL ?>translate_30.png' alt=''/> <span><?php $clang->eT("Quick-translation") ?></span>
                </a>
              </li>
            <?php } else { ?>
              <li>
                <a href="#" onclick="alert('<?php $clang->eT("Currently there are no additional languages configured for this survey.", "js") ?>');" >
                  <img src='<?php echo $sImageURL ?>translate_disabled_30.png' alt=''/> <span><?php $clang->eT("Quick-translation") ?></span>
                </a>
              </li>
            <?php } ?>
          <?php endif ?>
          
          <?php if (Permission::model()->hasSurveyPermission($surveyid,'surveycontent','update')): ?>
            <li>
              <a href="<?php echo $this->createUrl("admin/expressions"); ?>">
                <img src='<?php echo $sImageURL ?>expressionmanager_30.png' alt=''/> <span><?php $clang->eT("Expression Manager") ?></span>
              </a>
            </li>

            <li>
              <?php if ($conditionscount>0): ?>
                <a href="<?php echo $this->createUrl("/admin/conditions/sa/index/subaction/resetsurveylogic/surveyid/{$surveyid}"); ?>">
                  <img src='<?php echo $sImageURL ?>resetsurveylogic_30.png' alt=''/> <span><?php $clang->eT("Reset conditions") ?></span>
                </a>
              <?php else: ?>
                <a href="#" onclick="alert('<?php $clang->eT("Currently there are no conditions configured for this survey.", "js") ?>');" >
                  <img src='<?php echo $sImageURL ?>resetsurveylogic_disabled_30.png' alt=''/> <span><?php $clang->eT("Reset conditions") ?></span>
                </a>
              <?php endif ?>
            </li>
            
            <li class="divider"></li>
            <li class="nav-header hideable hidden-hideable"><?php $clang->eT("Regenerate question codes") ?></li>
            <li>
              <a href="<?php echo $this->createUrl("/admin/survey/regenquestioncodes/surveyid/{$surveyid}/subaction/straight"); ?>">
                <img src='<?php echo $sImageURL ?>resetsurveylogic_30.png' alt=''/> <span><?php $clang->eT("Straight") ?></span>
              </a>
            </li>
            <li>
              <a href="<?php echo $this->createUrl("/admin/survey/regenquestioncodes/surveyid/{$surveyid}/subaction/bygroup"); ?>">
                <img src='<?php echo $sImageURL ?>resetsurveylogic_30.png' alt=''/> <span><?php $clang->eT("By question group") ?></span>
              </a>
            </li>
          <?php endif ?>
          
          <li class="divider"></li>

          <li class="nav-header hideable hidden-hideable"><?php $clang->eT("Export...") ?></a></li>
          <?php if($surveyexport): ?>
            <li>
              <a href='<?php echo $this->createUrl("admin/export/sa/survey/action/exportstructurexml/surveyid/$surveyid") ?>' >
                <img src='<?php echo $sImageURL ?>export_30.png' alt='' /> <span><?php $clang->eT("Survey structure (.lss)") ?></span>
              </a>
            </li>
            <li>
              <a href='<?php echo $this->createUrl("admin/export/sa/survey/action/exportstructurequexml/surveyid/$surveyid") ?>' >
                <img src='<?php echo $sImageURL ?>export_30.png' alt='' /> <span><?php $clang->eT("queXML format (*.xml)") ?></span>
              </a>
            </li>
            <li>
              <a href='<?php echo $this->createUrl("admin/export/sa/survey/action/exportstructuretsv/surveyid/$surveyid") ?>' >
                <img src='<?php echo $sImageURL ?>export_30.png' alt='' /> <span><?php $clang->eT("Tab-separated-values format (*.txt)") ?></span>
              </a>
            </li>
            <?php if($respstatsread): ?>
              <?php if($activated): ?>
                <li>
                  <a href='<?php echo $this->createUrl("admin/export/sa/survey/action/exportarchive/surveyid/$surveyid") ?>' >
                    <img src='<?php echo $sImageURL ?>export_30.png' alt='' /> <span><?php $clang->eT("Survey archive (.lsa)") ?></span>
                  </a>
                </li>
              <?php else: ?>
                <li>
                  <a href="#" onclick="alert('<?php $clang->eT("You can only archive active surveys.", "js") ?>');" >
                    <img src='<?php echo $sImageURL ?>export_disabled_30.png' alt='' /> <span><?php $clang->eT("Survey archive (.lsa)") ?></span>
                  </a>
                </li>
              <?php endif ?>
            <?php endif ?>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="span10" id="main-content">