
<!-- This is the project specific website template -->
<!-- It can be changed as liked or replaced by other content -->

<?php

$domain=ereg_replace('[^\.]*\.(.*)$','\1',$_SERVER['HTTP_HOST']);
$group_name=ereg_replace('([^\.]*)\..*$','\1',$_SERVER['HTTP_HOST']);
$themeroot='r-forge.r-project.org/themes/rforge/';

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en   ">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title> The DNAmixtures package </title>
	<link href="http://<?php echo $themeroot; ?>styles/estilo1.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico">
  </head>

<body>

<!-- R-Forge Logo -->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td>
<a href="http://r-forge.r-project.org/"><img src="http://<?php echo $themeroot; ?>/imagesrf/logo.png" border="0" alt="R-Forge Logo" /> </a> </td> </tr>
</table>


<!-- get project title  -->
<!-- own website starts here, the following may be changed as you like -->

<?php 
//if ($handle=fopen('http://'.$domain.'/export/projtitl.php?group_name='.$group_name,'r')){
//$contents = '';
//	while (!feof($handle)) {
//	$contents .= fread($handle, 8192);
//}
//fclose($handle);
//echo $contents; } 
?>

<h1> The DNAmixtures package </h1>

The DNAmixtures package implements a statistical model for mixed
traces of DNA described in <a href = "http://arxiv.org/abs/1302.4404">
Analysis of DNA mixtures with Artefacts</a>. 

Features include parameter-fitting, visual diagnostics, evaluation of
the likelihood, and prediction of the genotypes of unknown
contributors to the model.

<p>
Questions and comments are very welcome and can be directed to Therese Graversen. For contact details, 
see the <a href="http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/"><strong>project summary page</strong></a>. </p>

<!-- end of project description -->

<h2> Computation on Bayesian networks </h2>

When unknown contributors are included in a model, the implementation
relies on <a href = "http://www.hugin.com">Hugin</a> through the API
provided in the <a href ="http://rhugin.r-forge.r-project.org/">RHugin package</a>. Hugin is
solely used for performing computations on the Bayesian networks
created by DNAmixtures, and in principle another engine could be used
in place of Hugin; however, this is currently not supported.

Note that the DNAmixture package can be used with the free version of
Hugin, HuginLite, though due to a limitation in the size of networks
allowed by the free version, in practice it will restrict the
functionality in DNAmixtures to mixtures with no unknown contributors.

<h2> Installation </h2>

<h4> Installing dependencies </h4>

See the <a href = "http://rhugin.r-forge.r-project.org/">RHugin
package homepage </a> on how to install RHugin and its dependencies.

Furthermore, DNAmixtures require packages Rsolnp, Matrix, and
numDeriv, that can all be obtained as
<pre> 
install.packages(c("Rsolnp", "Matrix", "numDeriv")) 
</pre>

<h4> Installing DNAmixtures </h4>

Once the dependencies are installed, DNAmixtures can be installed by
<pre>
install.packages("DNAmixtures", repos = "http://dnamixtures.r-forge.r-project.org/", 
type = "source", INSTALL_opts = "--no-multiarch")
</pre>

<h2> Getting started </h2>

The package help page contains the most essential information as well
as an example analysis.  The initial part of the example
can be run with HuginLite only, whereas the second part substituting
known contributor for an unknown contributor requires a full licenced
version of Hugin.

The example can be found as
<pre>
library(DNAmixtures)
help(DNAmixtures)
</pre>


</body>
</html>
