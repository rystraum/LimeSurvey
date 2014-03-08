<div class="container">
  <div class="row-fluid">
    <div class="span12">
      <table class="table">
        <?php foreach($llous as $llou): ?>
        <tr>
          <td><?php echo $llou->name ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>