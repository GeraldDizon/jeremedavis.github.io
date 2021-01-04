<?php 
  require("../Database/Query/ViewUsers.php");

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<?php 
    foreach($users as $row){ ?>
      <input type="text" name="amount" id="amount" />
          <br>
    <?php } ?>

    
</body>
<script>
$('.radiogroup').on('change', function() {
  $('#amount').val( this.value );
});
</script>
</html>