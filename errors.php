<?php
if (count($errors) > 0):?>
  <br><div class="error">
    <?php foreach ($errors as $error):?>
  	  <p style="margin-top:10px;"><?php echo $error;?></p>
  	<?php endforeach?>
  </div>
<?php endif?>