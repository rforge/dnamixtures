<?php

$domain=ereg_replace('[^\.]*\.(.*)$','\1',$_SERVER['HTTP_HOST']);
$group_name=ereg_replace('([^\.]*)\..*$','\1',$_SERVER['HTTP_HOST']);
$themeroot='r-forge.r-project.org/themes/rforge/';

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

  <div id="logo">  
  <!-- R-Forge Logo -->
  <table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr><td>
  <a href="http://r-forge.r-project.org/"><img src="http://<?php echo $themeroot; ?>/imagesrf/logo.png" border="0" alt="R-Forge Logo" /> </a> </td> </tr>
  </table>
  </div>
  
  <h1 id="projectname"> The DNAmixtures package  </h1>
  <h2 id="projectsubname"> Statistical analysis of DNA mixtures with artefacts </h2>
  
<hr/>
<p>
The DNAmixtures package implements a statistical model for mixed
  samples of DNA, described in a recent paper, <a href = "http://onlinelibrary.wiley.com/doi/10.1111/rssc.12071/full">
Analysis of Forensic DNA mixtures with Artefacts</a>, which is published with discussion in Journal of the Royal Statistical Society, series C. 
</p>
Features include 
<ul>
<li>Parameter fitting</li> 
<li>Visual diagnostics</li> 
<li>Evaluation of the likelihood</li> 
<li>Prediction of the genotypes of unknown
contributors to the DNA mixture.</li>
</ul>

<h4> References </h4>
<ul>
<li>
The computational approach is discussed in <a href="http://link.springer.com/article/10.1007/s11222-014-9451-7">
Computational aspects of DNA mixture analysis</a> where also the various tools for model checking are introduced.
</li>
<li> Example analyses and further details about both the model and the implementation may be found in <a href = "http://ora.ox.ac.uk/objects/uuid:4c3bfc88-25e7-4c5b-968f-10a35f5b82b0">Statistical and Computational Methodology for the Analysis of Forensic DNA Mixtures with Artefacts</a>.
</li>
<li>
The analyses in <a href = "http://onlinelibrary.wiley.com/doi/10.1111/rssc.12071/full">
Analysis of Forensic DNA mixtures with Artefacts</a> are performed using DNAmixtures and are documented as a short tutorial in the supporting information <a href = "http://onlinelibrary.wiley.com/store/10.1111/rssc.12071/asset/supinfo/rssc12071-sup-0001-SuppInfo.pdf?v=1&s=290479848c46713e7e040fb993a5ba9115e8d54b"> Case analysis using the DNAmixtures package. </a>
</li>
</ul>

<h4> Computation on Bayesian networks </h4>

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

<h4> Contact </h4>
<p>
  Questions and comments are very welcome and can be directed to the author, Therese Graversen. For contact details, 
see the <a href="http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/"><strong>project summary page</strong></a>. </p>


<h2> Installation </h2>

<h4> Installing dependencies </h4>

See the <a href = "http://rhugin.r-forge.r-project.org/">RHugin
package homepage </a> on how to install RHugin and its dependencies.

Furthermore, DNAmixtures requires packages Rsolnp, Matrix, and
numDeriv to be installed, and these can be obtained as
<p class="code"> 
install.packages(c("Rsolnp", "Matrix", "numDeriv")) 
</p>

<h4> Installing DNAmixtures </h4>

Once the dependencies are installed, DNAmixtures can be installed by
<p class="code">
install.packages("DNAmixtures", repos = "http://dnamixtures.r-forge.r-project.org/", <br/>
type = "source", INSTALL_opts = "--no-multiarch")
</p>

<h2> Getting started </h2>

The package help page contains the most essential information as well
as an example analysis.  The initial part of the example
can be run with HuginLite only, whereas the second part substituting
known contributor for an unknown contributor requires a full licenced
version of Hugin.

The example can be found as
<p class="code">
library(DNAmixtures)<br/>
help(DNAmixtures)
</p>

<h2> Release Log </h2>
<h4> DNAmixtures 0.1-4 released 2015-01-22</h4>
<ul>
<li> Small fix to ensure that alleles are correctly matched based on their repeat number (Thanks to Øyvind Bleka for reporting this). </li>
</ul>
<h4> DNAmixtures 0.1-3 released 2014-04-05</h4>
<ul>
<li> The likelihood function can now optionally be maximised without imposing an order on unknown contributors. </li>
<li> Highly implausible parameter values are better handled.</li>
<li> Small bug-fixes to <code>predict</code> regarding a missing propagation step and the 
handling of mixtures with non-overlapping sets of markers.</li>
</ul>
<h4> DNAmixtures 0.1-2 released 2014-01-22</h4>
<ul>
<li> A significant speedup has been implemented. </li>
</ul>
<h4> DNAmixtures 0.1-1 released 2013-12-08</h4>
<ul>
<li> Function <code>setPeakInfo</code> for taking into account the observed peaks using a specified model parameter has been added.
Both discrete information about presence/absence of peaks and the full peak heights can be used. </li>
<li> A function <code>removePeakInfo</code> for removing information about observed peaks has been added. </li>
<li> <code>set.cpt</code> has been renamed to <code>setCPT</code>; Functions <code>set.CPT.[O/D/Q]</code> are renamed to <code>setCPT.[O/D/Q]</code>.</li>
<li> The functions <code>setCPT</code> and <code>setCPT.O</code> no longer automatically include the peak height information.</li>
<li> Functions <code>parameters</code> and <code>condPeakHeights</code> have been removed, and information of 
the state of the networks (e.g. specified parameters) is no longer maintained in the <code>DNAmixture</code> objects. It is up to the user to 
ensure that the Bayesian networs represent the distribution of interest.</li>
<li> The package functions may during computations change the state of the Bayesian 
networks in a DNAmixture, both in terms of propagated 
evidence and of the model parameters used. In particular, many functions now initially retract all evidence 
to ensure the networks represent the correct distribution. In special cases, the user may wish to keep some evidence during 
the computations; this can be achieved through an argument <code>initialize=FALSE</code>. </li>
<li> Printing a summary of <code>map.genotypes</code> can now be done for selected markers only. </li>
<li> <code>mixML</code> returns the mle as class <code>mixpar</code>.</li>
<li> <code>varEst</code> has been improved</li>
<li> Plot methods have been improved. </li>
<li> <code>logL.K</code> now ensures that phi has the right ordering. </li>
<li> <code>get.shapes</code> has been renamed to <code>getShapes</code>. </li>
</ul>
<h4> DNAmixtures 0.1-0 released 2013-06-10</h4>
<ul>
<li> First release. </li>
</ul>
</div>

<div id="footer">
<div id="validation">

    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>

<a href="http://jigsaw.w3.org/css-validator/check/referer">
<img style="border:0;width:88px;height:31px"
src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
alt="Valid CSS!" />
</a>

</div>
</div>

</body>
</html>
