    </div> <!-- #super_row -->
  </div> <!-- #main_container -->
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script type="text/javascript" src="<?php echo Yii::app()->getConfig('generalscripts');?>jquery/jquery.js"></script> -->
  <script type="text/javascript" src="<?php echo Yii::app()->getConfig('adminstyleurl');?>jquery.1.10.2.min.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->getConfig('adminstyleurl');?>jquery.workarounds.js"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->getConfig('adminstyleurl');?>bootstrap.js"></script>
  <?php
    if(!empty($js_admin_includes)) {
      foreach ($js_admin_includes as $jsinclude) {
        echo '<script type="text/javascript" src="' . $jsinclude . '"></script>';
      }
    }
    if(!empty($css_admin_includes)) {
      foreach ($css_admin_includes as $cssinclude) {
        echo '<link rel="stylesheet" type="text/css" media="all" href="' . $cssinclude . '" />';
      }
    }
  ?>
</body>
</html>
