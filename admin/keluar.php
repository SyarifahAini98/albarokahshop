<?php
	session_start();
	unset($_SESSION['masuk']);
	session_destroy();
	{
		echo '<script>window.location = "index.php"</script>';
	}
?>