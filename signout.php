<?php
	echo '<script>alert("You Have Logged Out !")</script>';
	session_start();
	session_destroy();
	echo "<script>location.href='index.html'</script>";
?>