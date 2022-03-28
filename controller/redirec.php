<?php session_start();
error_reporting(0);
switch ($_SESSION['cargo']) {
		//Redirec segun cargo.

		case '2':
		
?>
<script type="text/javascript">
window.location.href = '../r/u/index.php';
</script>
<?php
		break;

		case '1':
		
?>
<script type="text/javascript">
window.location.href = '../r/a/index.php';
</script>
<?php
		break;

		default:
			
?>
<script type="text/javascript">
window.location.href = '../index.php';
</script>
<?php
		break;
	}
?>
