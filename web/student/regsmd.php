<?php require('../global/connect.php'); ?>
<form method=post action="//reg-smd.kku.ac.th/login.php" name="redirect">
<input type=hidden name="STUDENT_ID" value="<?php echo $_SESSION['id']; ?>">
<input type=hidden name="STUDENT_PASSWORD" value="<?php echo getUserdata($_SESSION['id'], 'citizen_id', $conn); ?>">
</form>

<script>
window.onload = function(){
  document.forms['redirect'].submit();
}
</script>