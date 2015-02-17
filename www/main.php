<?php $pageHeader=" Statistical analysis of DNA mixtures with artefacts"; ?>

<p>
<span class="rpkg">DNAmixtures</span> is a statistical framework for analysis of DNA samples
  from one or multiple donors. <span class="rpkg">DNAmixtures</span> implements a statistical
  model described in a recent paper, <a href
  = "http://onlinelibrary.wiley.com/doi/10.1111/rssc.12071/full"
  class="papertitle"> Analysis of Forensic DNA mixtures with
  Artefacts</a>, that is published with discussion in Journal of the
  Royal Statistical Society, series C.
</p>


<img src="graphics/screenshot.png" id="screenshot" alt="Screenshot of DNAmixtures in the R GUI"></img>

<div id="featurelist">
<dl>
<dt>Common forensic applications</dt>
<dd>Computation of likelihood ratios</dd>
<dd>Deconvolution of the DNA mixture</dd>
<dd>Combined analysis of multiple traces of DNA</dd>
</dl>

<dl>
<dt>Visual assessment of the statistical modelling</dt>
<dd>Does the hypothesis explain the data well?</dd>
<dd>Is the distribution of peak heights adequate?</dd>
</dl>

<dl> <dt>Efficient exact computation</dt>
 <dd>Runs on a standard desktop or laptop</dd> 
<dd>Allows a higher number of contributors </dd> 
</dl>

<dl>
<dt>A complete statistical framework</dt>
<dd>Exact computation of the likelihood function</dd>
<dd>Maximum likelihood estimation of parameters</dd>
<dd>Simulation of genotypes and peak heights</dd>
<dd>Access to various conditional distributions of peak
  heights given data</dd>
</dl>
</div>

<div style="clear:both"></div>



<div id="reqAndInstall">
<h3>System requirements</h3>
<p>
<span class="rpkg">DNAmixtures</span> may be installed on any system
(Windows, Linux, or MacOS), on which the following three programs are
installed:</p>
<table>
  <tr>
    <th><a class="reqtitle"
    href="http://www.r-project.org">R</a></th><td>Statistical
    software</td>
  </tr>
  <tr>
    <th><a class="reqtitle"
    href="http://www.hugin.com">Hugin</a></th><td>Expert system for
    Bayesian networks</td>
  </tr>
  <tr>
    <th><a class="reqtitle"
    href="http://rhugin.r-forge.r-project.org">RHugin</a></th><td>API
    for calling Hugin from within R</td>
  </tr>
</table>
<p><span class="rpkg">DNAmixtures</span> can be installed and loaded from R by:</p>
<p class="code">
install.packages("DNAmixtures", repos = "http://dnamixtures.r-forge.r-project.org/", <br/>
		 type = "source", INSTALL_opts = "--no-multiarch")<br/>
library(DNAmixtures)
</p>
<p> For further details on installation, see
  the <a href="?page=installation">Installation page</a>.</p>
</div>

<p> Questions and comments are very welcome and can be directed to the
  author, <a href="mailto:graversen@math.ku.dk">Therese
  Graversen</a>.</p>

