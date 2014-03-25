<?php
    $yii = Yii::app();
    $controller = $yii->getController();
?>
<div id='general'>
    <script type="text/javascript">
      var mylangs = new Array();
      var standardtemplaterooturl = '<?php echo $yii->getConfig('standardtemplaterooturl') ?>';
      var templaterooturl = '<?php echo $yii->getConfig('usertemplaterooturl') ?>';
    </script>

    <input type='hidden' name='admin' value='<?php echo $owner['full_name'] ; ?>' />
    <input type='hidden' name='adminemail' value='<?php echo $owner['email'] ; ?>' /></li>
    <input type='hidden' name='bounce_email' value='<?php echo $owner['bounce_email'] ; ?>' /></li>
    <input type='hidden' name='faxto' value='' />
    <ul>
        <?php
           if (isset($pluginSettings))
           {
               Yii::import('application.helpers.PluginSettingsHelper');
               $PluginSettings = new PluginSettingsHelper();
               foreach ($pluginSettings as $id => $plugin)
               {
                   foreach ($plugin['settings'] as $name => $setting)
                   {
                       $name = "plugin[{$plugin['name']}][$name]";
                       echo CHtml::tag('li', array(), $PluginSettings->renderSetting($name, $setting, null, true));
                   }
               }
           }

        ?>
    </ul>
</div>
