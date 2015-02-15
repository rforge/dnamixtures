<p>
A detailed svn log of changes can be found at the <a href="http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/"><span class="rpkg">DNAmixtures</span> project summary page</a>.
</p>

<div id="log">
<h4> DNAmixtures 0.1-4 released 2015-01-22</h4>
<ul>
<li> Small fix to ensure that alleles are correctly matched based on their repeat number (Thanks to &Oslash;yvind Bleka for reporting this). </li>
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