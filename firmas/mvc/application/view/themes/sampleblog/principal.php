<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Sample Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo __FULL_URL__; ?>css/style.css" />
<script src="<?php echo __FULL_URL__; ?>js/jquery-1.7.1.min.js"></script>
<script src="<?php echo __FULL_URL__; ?>js/system.js?123"></script>
<script type="text/javascript">
    var global_data = { user: '', user_key: '69', theme: '<?php echo __FULL_URL__; ?>' };
</script>
</head>

<body>

<div id="header">Blog Title<div class="header">A description or subtitle of your blog site goes here.</div></div>

<!-- menu horizontal -->
<div id="menu">
	<div class="menu"><a href=".">home</a></div>
	<div class="menu"><a href="index.php?load=page&id=1">Page #1</a></div>
	<div class="menu"><a href="index.php?load=page&id=2">Page #2</a></div>
	<div class="menu"><a href="index.php?load=page&id=3">Page #3</a></div>
	<div class="menu"><a href="index.php?load=page&id=find">Busqueda Ajax</a></div>
</div>
<!-- menu horizontal:end -->
<div id="body">
        <!-- contenido -->
	<div class="content">
            <?php echo (isset($content))?$content:'Not Found'; ?>
	</div>
        <!-- contenido:end -->
        <!-- sidebar -->
	<div id="sidebar">
	<div class="topside">Profile</div>
	<p><img class="img" src="<?php echo __FULL_URL__; ?>images/photo.gif" alt=" " />Name: jc mouse<br />Location: Bolivia</p>
	<div class="center"><a href="#">View complete profile</a><p><br /></p></div>

	<div class="topside">Recent Posts</div>
	<ul>
	<li><a href="#">Post #1</a></li>
	<li><a href="#">Post #2</a></li>
	<li><a href="#">Post #3</a></li>
	</ul>
	
	</div>
        <!-- sidebar:end -->
	<div class="footer"></div>
</div>
<!-- pie -->
<div id="footer"><p>&copy; Copyright 2013 Your Company Name. All Rights Reserved.
<br />Website by <a href="#">Bolivia Design</a>.<a href="http://validator.w3.org/check?uri=referer"> XHTML 1.0 Strict</a>
 &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer ">CSS Valid</a>.</p>
</div>
<!-- pie:end -->
</body>

</html>
