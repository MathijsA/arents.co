<?php
session_start();
?>

<head>
<title>Mathijs Arents</title>
</head>
<!-- portal-->
<body>
	index.php
	<?php include("header.php") ?>
	<?php include("nav.php") ?>

<div class="content">
  <div class="content_spacer"></div>
</div>
<div class="content2">
<h3>
  Sign in </h3>
<?php include("login2.php"); ?>
</div>
<!--<?php
  //error_reporting(E_ERROR | E_PARSE);

  //include("backup.php") ?>
</div>-->
<div class="footer">
  <?php include("../footer.php") ?>
</div>

</body>
