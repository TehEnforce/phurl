<?php
if( !defined('PHURL' ) ) {
    header('HTTP/1.0 404 Not Found');
    exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $phurl_config['site_name']; ?> | <?php echo $phurl_config['site_slogan']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo $phurl_config['theme_path']; ?>style.css" />
	<script type="text/javascript" src="<?php echo $phurl_config['theme_path']; ?>jquery.js"></script>
	
	<script type="text/javascript"> 
	$(document).ready(function(){
		$("input#url").bind("textchange",showPage);
		$("input#url").focus();
    });
	
	$(document).click(function(){
		showPage();
    });
	
	function showPage() {
		$("#show-options").animate({ opacity: 1}, 2000);
		$("#header").animate({ opacity: 1}, 1000);
		$(".notice").animate({ opacity: 1}, 1000);
		$("#footer").animate({ opacity: 1}, 1000);
	}

	</script>
<?php
$getalias = trim(mysql_real_escape_string($_SERVER['REQUEST_URI']));
$alias = substr($getalias, 1, strlen($getalias));
$alias = str_replace("-","",$alias);
$jquery = <<<JQUERY
<script>
 $(document).ready(function() {
 	 $("#dynamicdiv").load("stats/dynamic.php?alias=$alias");
   var refreshId = setInterval(function() {
      $("#dynamicdiv").load('stats/dynamic.php?alias=$alias');
   }, 9000);
   $.ajaxSetup({ cache: false });
});
</script>
JQUERY;
echo $jquery;
?>

</head>
<body>
<div id="container">
 <div id="header">
 	<div id="logo"><h1><?php echo $phurl_config['site_name']; ?></h1></div>
 	<span id="slogan">- <?php echo $phurl_config['site_slogan']; ?></span>
 	<div id="menu">
 		<ul>
 			<li><a href="/">Home</a></li>
<li><a href="/api/create.php?url=http://example.org/">API</a></li>

 		</ul>
 	</div>
 	<div class="clear"></div>
 	
 </div>
<div id="content">
