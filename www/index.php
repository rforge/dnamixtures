<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//$domain=ereg_replace('[^\.]*\.(.*)$','\1',$_SERVER['HTTP_HOST']);
//$group_name=ereg_replace('([^\.]*)\..*$','\1',$_SERVER['HTTP_HOST']);
$themeroot='r-forge.r-project.org/themes/rforge/';

if (isset($_GET['page'])){
$page = $_GET['page'];
} else{
$page = "main";
}
$pagecontent = $page.".php";



echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html
	  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="The features of the DNAmixtures R-package include parameter-fitting, evaluation of the likelihood, prediction of genotypes, and visual diagnostics." />
    <meta name="keywords" content="DNA mixture, DNA mixtures, R-package, statistical inference, mixed profile, deconvolution, likelihood ratio, maximum likelihood, genotype, evidence, EPG, forensic genetics, DNAmixtures" />
    <meta name="google-site-verification" content="e6ukA82x3m80Gndv4ZYqjkIW9Mx-IyVdGlCG2qfDGnU" />
    <title> The DNAmixtures package </title>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico"/>
  </head>

  <body>

    <div id="wrap">

      <div style="float:left">
      <h1 id="projectname">DNAmixtures</h1>
      <h2 id="projectsubname">Statistical analysis of DNA mixtures
      with artefacts</h2>
      </div>
      <div id="logo">
	<!-- R-Forge Logo -->
	<a href="http://r-forge.r-project.org/"><img src="http://<?php echo $themeroot; ?>/imagesrf/logo.png" border="0" alt="R-Forge Logo" width="192" height="54"/> </a>
      </div>
      <div style="clear:both"></div>
      <address>
	by <a href="mailto:graversen@math.ku.dk">Therese Graversen</a>
      </address>


      <div id="menu">
	<ul>
	  <li><a href="?page=main" title="" accesskey="h"
		 <?php if ($page=="main") echo "class=\"currentPage\"";?>>
	      <span class="aKey">H</span>ome</a>
	  </li>
	  <li><a href="?page=installation" title="" accesskey="i"
		 <?php if ($page=="installation") echo "class=\"currentPage\"";?>>
	      <span class="aKey">I</span>nstallation</a>
	  </li>
	  <li><a href="?page=tutorial" title=""
	  accesskey="e" <?php if ($page=="tutorial") echo "class=\"currentPage\"";?>>
	      <span class="aKey">T</span>utorial</a>
	  </li>
	  <li><a href="?page=references" title=""
		 accesskey="r"
		 <?php if ($page=="references") echo "class=\"currentPage\"";?>>
	      <span class="aKey">R</span>eferences</a>
	  </li>
	  <li><a href="?page=releaselog" title=""
		 accesskey="n"
		 <?php if ($page=="releaselog") echo "class=\"currentPage\"";?>>
	      <span class="aKey">N</span>ews</a>
	  </li>
	</ul>
      </div>
      <div style="clear:both"></div>


      <div id="content">
	<?php include $pagecontent; ?>
      </div>

    </div>

    <div id="footer">
      <div id="validation">
	<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10-blue"
								 alt="Valid XHTML 1.0 Transitional" height="31" width="88"
								 /></a>
	<a href="http://jigsaw.w3.org/css-validator/check/referer">
	  <img style="border:0;width:88px;height:31px"
	       src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
	       alt="Valid CSS!" />
	</a>
      </div>
    </div>

  </body>
</html>
