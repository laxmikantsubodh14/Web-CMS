<?php
session_start();
session_destroy();
session_unset();
?>
				<script language="javascript">
				location.href="index.php";
				</script>
				<?php  //header("Location: index.php");
exit;
?>