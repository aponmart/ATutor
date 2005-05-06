<?php
$parts = pathinfo($_SERVER['PHP_SELF']);
if (substr($parts['dirname'], -5) == 'admin') {
	$section = 'admin';
} else {
	$section = 'instructor';
}
$path = '../common/';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Documentation</title>
<script type="text/javascript">

var i = 0;

function show2() {
	var fs = document.getElementById('frameset1');
	if (fs) {
		i += 5;
		if (i > 28) {
			i = 28;
		}
		fs.cols = i + '%, *';
	}
	if (i < 28) {
		window.setTimeout('show2()', 1);
	}
	return false;
}
function show() {
	i = 0;
	window.setTimeout('show2()', 1);
	return false;
}

function hide2() {
	var fs = document.getElementById('frameset1');
	if (fs) {
		i -= 5;
		if (i < 0) {
			i =0;
		}
		fs.cols = i + '%, *';
	}
	if (i > 0) {
		window.setTimeout('hide2()', 1);
	}
	return false;
}

function hide() {
	i= 28;
	window.setTimeout('hide2()', 1);
	return false;
}
</script>

<?php 
if (isset($_GET['p'])) {
	$body = $_GET['p'];
} else {
	$body = '0.0.introduction.php';
} 
?>
</head>
<frameset rows="24,*">
	<frame src="<?php echo $path; ?>frame_header.php?<?php echo $section; ?>" frameborder="0" name="header" title="header" scrolling="no" noresize="noresize">
	<frameset cols="28%, *" id="frameset1">
		<frame frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="<?php echo $path; ?>frame_toc.php?<?php echo $section; ?>" name="toc" id="toc" title="TOC">
		<frame frameborder="0" src="<?php echo $body; ?>" name="body" title="blank">
	</frameset>

	<noframes>
		<h1>Administrator Documentation</h1>
		<p><a href="frame_toc.html">Table of Contents</a></p>
	 </noframes>
</frameset>

</html>