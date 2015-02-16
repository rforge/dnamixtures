

<h1>Tutorial</h1>

<p>
Below we demonstrate a few features
of <span class="rpkg">DNAmixtures</span>. For a more thorough
walk-through, see for instance the example analysis in <a href =
"http://onlinelibrary.wiley.com/store/10.1111/rssc.12071/asset/supinfo/rssc12071-sup-0001-SuppInfo.pdf?v=1&amp;s=290479848c46713e7e040fb993a5ba9115e8d54b"
class="papertitle">Case analysis using the DNAmixtures package</a> or
the detailed discussions
in <a href="?page=references#graversen-14" class="paperref">Graversen (2014)</a>.
</p>

<h2>Setting up a DNA mixture model</h2>

<div class="chunk" id="peakheights"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl kwd">data</span><span class="hl std">(MC15)</span>
<span class="hl std">MC15[MC15</span><span class="hl opt">$</span><span class="hl std">marker</span> <span class="hl opt">==</span> <span class="hl str">&quot;TH01&quot;</span><span class="hl std">,]</span>
</pre></div>
<div class="output"><pre class="knitr r">##    marker allele height K1 K2 K3
## 35   TH01    7.0    727  1  0  0
## 36   TH01    8.0    625  1  0  0
## 37   TH01    9.0      0  0  2  0
## 38   TH01    9.3    165  0  0  2
</pre></div>
</div></div>

<p>The allele frequencies are also specified in
a <code>data.frame</code>, this one containing
variables <code>marker</code>, <code>allele</code>, and
<code>frequency</code>. The range of alleles in this dataset determines the
range of alleles used in the model.</p>

<p> The US-Caucasian allele frequencies are included in the
package:</p>
<div class="chunk" id="allelefreqs"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl kwd">data</span><span class="hl std">(USCaucasian)</span>
<span class="hl std">USCaucasian[USCaucasian</span><span class="hl opt">$</span><span class="hl std">marker</span> <span class="hl opt">==</span> <span class="hl str">&quot;TH01&quot;</span><span class="hl std">,]</span>
</pre></div>
<div class="output"><pre class="knitr r">##    marker allele   frequency
## 22   TH01    5.0 0.001659967
## 23   TH01    6.0 0.231785364
## 24   TH01    7.0 0.190396192
## 25   TH01    8.0 0.084438311
## 26   TH01    9.0 0.114237715
## 27   TH01    9.3 0.367542649
## 28   TH01   10.0 0.008279834
## 29   TH01   11.0 0.001659967
</pre></div>
</div></div>

<p>
As an example, let us create a model for the single DNA mixture
MC15. The prosecution hypothesis could be that K1, K2, and K3 have
contributed to the trace together with an unknown contributor U1. We
set the detection threshold C to 50 rfu.
</p>
<div class="chunk" id="DNAmixture"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl kwd">data</span><span class="hl std">(SGMplusDyes)</span>
<span class="hl std">mixHp</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">DNAmixture</span><span class="hl std">(</span><span class="hl kwd">list</span><span class="hl std">(MC15),</span> <span class="hl kwc">k</span> <span class="hl std">=</span> <span class="hl num">4</span><span class="hl std">,</span> <span class="hl kwc">K</span> <span class="hl std">=</span> <span class="hl kwd">c</span><span class="hl std">(</span><span class="hl str">&quot;K1&quot;</span><span class="hl std">,</span> <span class="hl str">&quot;K2&quot;</span><span class="hl std">,</span> <span class="hl str">&quot;K3&quot;</span><span class="hl std">),</span> <span class="hl kwc">C</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">50</span><span class="hl std">),</span>
                    <span class="hl kwc">database</span> <span class="hl std">= USCaucasian,</span> <span class="hl kwc">dyes</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(SGMplusDyes))</span>
</pre></div>
</div></div>

<p>We can plot the peak heights by</p>
<div class="chunk" id="epgs"><div class="rcode"><div class="source"><pre class="knitr r">     <span class="hl kwd">plot</span><span class="hl std">(mixHp,</span> <span class="hl kwc">epg</span> <span class="hl std">=</span> <span class="hl num">TRUE</span><span class="hl std">,</span> <span class="hl kwc">dyecol</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl kwd">c</span><span class="hl std">(</span><span class="hl str">&quot;blue&quot;</span><span class="hl std">,</span> <span class="hl str">&quot;green&quot;</span><span class="hl std">,</span> <span class="hl str">&quot;black&quot;</span><span class="hl std">)))</span>
</pre></div>
</div><div class="rimage center"><img src="graphics/epgs-1.png" title="Observed peak heights" alt="Observed peak heights" class="plot" /></div></div>

<h2>Estimating model parameters</h2>

<p>Parameters can, for instance, be estimated by maximum
  likelihood. Here we using the parameter <code>p</code> as the
  initial value for optimisation.</p>

<div class="chunk" id="mle"><div class="rcode"><div class="source"><pre class="knitr r">     <span class="hl std">p</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">mixpar</span><span class="hl std">(</span><span class="hl kwc">rho</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">30</span><span class="hl std">),</span> <span class="hl kwc">eta</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">34</span><span class="hl std">),</span> <span class="hl kwc">xi</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">0.08</span><span class="hl std">),</span>
                 <span class="hl kwc">phi</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl kwd">c</span><span class="hl std">(</span><span class="hl kwc">K1</span> <span class="hl std">=</span> <span class="hl num">0.71</span><span class="hl std">,</span> <span class="hl kwc">K3</span> <span class="hl std">=</span> <span class="hl num">0.09</span><span class="hl std">,</span> <span class="hl kwc">K2</span> <span class="hl std">=</span> <span class="hl num">0.19</span><span class="hl std">,</span> <span class="hl kwc">U1</span><span class="hl std">=</span><span class="hl num">0.01</span><span class="hl std">)))</span>
     <span class="hl std">mlHp</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">mixML</span><span class="hl std">(mixHp,</span> <span class="hl kwc">pars</span> <span class="hl std">= p)</span>
     <span class="hl std">mlHp</span><span class="hl opt">$</span><span class="hl std">mle</span>
</pre></div>
<div class="output"><pre class="knitr r">##       rho     eta       xi     phi.U1   phi.K1    phi.K2   phi.K3
## 1   34.24   26.67   0.0737   0.008459   0.8205   0.04734   0.1237
</pre></div>
</div></div>

<p>Relying on asymptotic normality, we can compute standard errors for
  the estimates as follows.</p>

<div class="chunk" id="varEst"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl std">var15Hp</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">varEst</span><span class="hl std">(mixHp, mlHp</span><span class="hl opt">$</span><span class="hl std">mle,</span>
                  <span class="hl kwc">npars</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl kwc">rho</span> <span class="hl std">=</span> <span class="hl num">1</span><span class="hl std">,</span> <span class="hl kwc">eta</span> <span class="hl std">=</span> <span class="hl num">1</span><span class="hl std">,</span> <span class="hl kwc">xi</span> <span class="hl std">=</span> <span class="hl num">1</span><span class="hl std">,</span> <span class="hl kwc">phi</span> <span class="hl std">=</span> <span class="hl num">1</span><span class="hl std">))</span>
<span class="hl kwd">summary</span><span class="hl std">(var15Hp)</span>
</pre></div>
<div class="output"><pre class="knitr r">##             Estimate    StdErr
## rho.1      34.237686   7.13108
## eta.1      26.668447   5.61843
## xi.1        0.073699   0.01441
## phi.U1.1    0.008459   0.01853
## phi.K1.1    0.820501   0.02015
## phi.K2.1    0.047343   0.01361
## phi.K3.1    0.123698   0.01532
</pre></div>
</div></div>

<h2>The likelihood function and likelihood ratios</h2>


<p>To compute a likelihood ratio, we firstly need to formulate an
  alternative hypothesis. In this case, we substitute K3 for an unknown
  contributor.</p>

<div class="chunk" id="unnamed-chunk-2"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl std">mixHd</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">DNAmixture</span><span class="hl std">(</span><span class="hl kwd">list</span><span class="hl std">(MC15),</span> <span class="hl kwc">k</span> <span class="hl std">=</span> <span class="hl num">4</span><span class="hl std">,</span> <span class="hl kwc">K</span> <span class="hl std">=</span> <span class="hl kwd">c</span><span class="hl std">(</span><span class="hl str">&quot;K1&quot;</span><span class="hl std">,</span> <span class="hl str">&quot;K2&quot;</span><span class="hl std">),</span>
                      <span class="hl kwc">C</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">50</span><span class="hl std">),</span>
                      <span class="hl kwc">database</span> <span class="hl std">= USCaucasian)</span>
<span class="hl std">p</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">mixpar</span><span class="hl std">(</span><span class="hl kwc">rho</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">30</span><span class="hl std">),</span> <span class="hl kwc">eta</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">34</span><span class="hl std">),</span> <span class="hl kwc">xi</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl num">0.08</span><span class="hl std">),</span>
            <span class="hl kwc">phi</span> <span class="hl std">=</span> <span class="hl kwd">list</span><span class="hl std">(</span><span class="hl kwd">c</span><span class="hl std">(</span><span class="hl kwc">K1</span> <span class="hl std">=</span> <span class="hl num">0.71</span><span class="hl std">,</span> <span class="hl kwc">U1</span> <span class="hl std">=</span> <span class="hl num">0.09</span><span class="hl std">,</span> <span class="hl kwc">K2</span> <span class="hl std">=</span> <span class="hl num">0.19</span><span class="hl std">,</span> <span class="hl kwc">U2</span><span class="hl std">=</span><span class="hl num">0.01</span><span class="hl std">)))</span>
<span class="hl std">mlHd</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">mixML</span><span class="hl std">(mixHd,</span> <span class="hl kwc">pars</span> <span class="hl std">= p)</span>
<span class="hl std">mlHd</span><span class="hl opt">$</span><span class="hl std">mle</span>
</pre></div>
<div class="output"><pre class="knitr r">##       rho    eta        xi    phi.U1    phi.U2   phi.K1   phi.K2
## 1   25.54   35.8   0.07192   0.08115   0.08114   0.7983   0.0394
</pre></div>
</div></div>

<p>There is no designated function for computing a likelihood
  ratio. However, we can easily compute the weight-of-evidence against
  K3, which is simply log10 of the likelihood ratio.</p>

The (natural) log likelihood under each of the hypotheses is
<div class="chunk" id="unnamed-chunk-3"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl std">mlHp</span><span class="hl opt">$</span><span class="hl std">lik</span> <span class="hl com">## K1 &amp; K2 &amp; K3 &amp; U1</span>
</pre></div>
<div class="output"><pre class="knitr r">## [1] -271.8021
</pre></div>
<div class="source"><pre class="knitr r"><span class="hl std">mlHd</span><span class="hl opt">$</span><span class="hl std">lik</span> <span class="hl com">## K1 &amp; K2 &amp; U1 &amp; U2</span>
</pre></div>
<div class="output"><pre class="knitr r">## [1] -297.7915
</pre></div>
</div></div>
<p>
Taking their difference, we get the log likelihood ratio. This is then
divided by log(10) to get the logLR on log10 scale instead:</p>
<div class="chunk" id="unnamed-chunk-4"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl std">(mlHp</span><span class="hl opt">$</span><span class="hl std">lik</span> <span class="hl opt">-</span> <span class="hl std">mlHd</span><span class="hl opt">$</span><span class="hl std">lik)</span><span class="hl opt">/</span><span class="hl kwd">log</span><span class="hl std">(</span><span class="hl num">10</span><span class="hl std">)</span>
</pre></div>
<div class="output"><pre class="knitr r">## [1] 11.28704
</pre></div>
</div></div>

<h2>Mixture deconvolution</h2>

<p> If a proposed hypothesis includes unknown contributors, it may be
relevant to investigate likely allocations of genotypes for these
individuals. </p>

<p>Consider thus marker TH01 and the individual U1. We find the set of
all genotypes with a posterior probability above <code>pmin =
0.008</code> given the observed peak heights.</p>

<div class="chunk" id="deconvolution"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl kwd">setPeakInfo</span><span class="hl std">(mixHp, mlHp</span><span class="hl opt">$</span><span class="hl std">mle)</span>              <span class="hl com">## condition on observed peak heights</span>
<span class="hl std">mp</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">map.genotypes</span><span class="hl std">(mixHp,</span> <span class="hl kwc">pmin</span> <span class="hl std">=</span> <span class="hl num">0.008</span><span class="hl std">,</span>  <span class="hl com">## find the best set of genotypes</span>
                    <span class="hl kwc">markers</span> <span class="hl std">=</span> <span class="hl str">&quot;TH01&quot;</span><span class="hl std">)</span>
<span class="hl kwd">summary</span><span class="hl std">(mp)</span>
</pre></div>
<div class="output"><pre class="knitr r">## 
## TH01:
##      U1.1   U1.2   Prob    
## 1    9.3     NA    0.247461
## 2    7      9.3    0.154065
## 3    9.3    9.3    0.138326
## 4    7       NA    0.136296
## 5     NA     NA    0.108608
## 6    8      9.3    0.067610
## 7    8       NA    0.059862
## 8    7      7      0.042352
## 9    7      8      0.037264
## 10   8      8      0.008155
## 
## Total probability: 1
</pre></div>
</div></div>

<p>The <code>NA</code> indicates a dropped out allele; the individual
has a high probability of exhibiting dropout, which is not surprising
given that the corresponding estimated mixture proportion was very
low. Further inspection shows that all other predicted alleles are, in
fact, masked by known contributors.
</p>

<h2>Challenging the interpretation of a mixture</h2>

<p> It is important to justify that any model under consideration can
  also suitably explain the data. The statistical framework
  of <code>DNAmixtures</code> enables the addressing of such issues.
</p>

<h3>Simulating peak heights</h3>

<p>The perhaps simplest way of comparing the observed peak heights to
their distribution under a particular model is to compare to a set of
simulated peak heights.</p>

<div class="chunk" id="boxplots"><div class="rcode"><div class="source"><pre class="knitr r">     <span class="hl com">## Compare observed peak heights to peak heights simulated under the model</span>
     <span class="hl std">sims</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">rPeakHeight</span><span class="hl std">(mixHp, mlHp</span><span class="hl opt">$</span><span class="hl std">mle,</span> <span class="hl kwc">nsim</span> <span class="hl std">=</span> <span class="hl num">100</span><span class="hl std">,</span> <span class="hl kwc">dist</span> <span class="hl std">=</span> <span class="hl str">&quot;conditional&quot;</span><span class="hl std">)</span>
     <span class="hl std">oldpar</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">par</span><span class="hl std">(</span><span class="hl kwc">mfrow</span> <span class="hl std">=</span> <span class="hl kwd">c</span><span class="hl std">(</span><span class="hl num">2</span><span class="hl std">,</span><span class="hl num">5</span><span class="hl std">),</span> <span class="hl kwc">mar</span> <span class="hl std">=</span> <span class="hl kwd">c</span><span class="hl std">(</span><span class="hl num">2</span><span class="hl std">,</span><span class="hl num">2</span><span class="hl std">,</span><span class="hl num">2</span><span class="hl std">,</span><span class="hl num">0</span><span class="hl std">))</span>
     <span class="hl kwd">boxplot</span><span class="hl std">(mixHp, sims)</span>
</pre></div>
</div><div class="rimage center"><img src="graphics/boxplots-1.png" title="Boxplots of simulated peak heights" alt="Boxplots of simulated peak heights" class="plot" /></div><div class="rcode">
<div class="source"><pre class="knitr r">     <span class="hl kwd">par</span><span class="hl std">(oldpar)</span>
</pre></div>
</div></div>

<p>In fact, we could also produce a plot using the quantiles in
  the <em>exact</em> distribution rather than relying on simulations; see for
  instance <a href="?page=references#graversen-14" class="paperref">Graversen
  (2014)</a>
  and <a href="?page=references#graversen-lauritzen-14" class="paperref">Graversen and
  Lauritzen (2014)</a></p>

<h3>Quantile-quantile plots</h3>
<p>The quantile-quantile plot is a convenient way of assessing whether
the observed peak heights follow their assumed distribution. If the
distribution is adequate, the points should follow the diagonal.</p>

<div class="chunk" id="qqplot"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl kwd">qqpeak</span><span class="hl std">(mixHp,</span> <span class="hl kwc">pars</span> <span class="hl std">= mlHp</span><span class="hl opt">$</span><span class="hl std">mle,</span> <span class="hl kwc">dist</span> <span class="hl std">=</span> <span class="hl str">&quot;conditional&quot;</span><span class="hl std">)</span>
</pre></div>
</div><div class="rimage center"><img src="graphics/qqplot-1.png" title="Quantile-quantile plot" alt="Quantile-quantile plot" class="plot" /></div></div>

<h3>Prequential monitor plots</h3>
<p> A prequential monitor may be used for assessing the ability of the
model to correctly predict the presence or absence of a peak for a
particular allele. For each position in the EPG in turn, we compare
whether the model predicts a peak or not to whether a peak has been
observed.</p>

<p>
We look out for upwards jumps, as they occur when the model has
predicted the opposite of what was observed. The monitor crossing the
upper 95% or 99% bounds indicates that mis-predictions occur more
frequently than expected.</p>

<div class="chunk" id="preqplotHp"><div class="rcode"><div class="source"><pre class="knitr r">     <span class="hl std">pr</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">prequential.score</span><span class="hl std">(mixHp,</span> <span class="hl kwc">pars</span> <span class="hl std">= mlHp</span><span class="hl opt">$</span><span class="hl std">mle)</span>
     <span class="hl kwd">plot</span><span class="hl std">(pr,</span> <span class="hl kwc">main</span> <span class="hl std">=</span> <span class="hl str">&quot;K1, K2, K3, and one unknown&quot;</span><span class="hl std">)</span>
</pre></div>
</div><div class="rimage center"><img src="graphics/preqplotHp-1.png" title="Prequential monitor for Hp" alt="Prequential monitor for Hp" class="plot" /></div></div>

<div class="chunk" id="preqplotHd"><div class="rcode"><div class="source"><pre class="knitr r">     <span class="hl std">pr</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">prequential.score</span><span class="hl std">(mixHd,</span> <span class="hl kwc">pars</span> <span class="hl std">= mlHd</span><span class="hl opt">$</span><span class="hl std">mle)</span>
     <span class="hl kwd">plot</span><span class="hl std">(pr,</span> <span class="hl kwc">main</span> <span class="hl std">=</span> <span class="hl str">&quot;K1, K2, and two unknowns&quot;</span><span class="hl std">)</span>
</pre></div>
</div><div class="rimage center"><img src="graphics/preqplotHd-1.png" title="Prequential monitor for Hd" alt="Prequential monitor for Hd" class="plot" /></div></div>

<p>In both plots, the prequential monitors stay well within the upper
  bound, indicating that the presence and absense of peaks in the EPG
  is adequately explained by either of the hypotheses under
  consideration.</p>


<h2>Advanced examples</h2>

<p> <span class="rpkg">DNAmixtures</span> provides easy access to a wide
range of statistically interesting quantities.</p>

<p>As an example, we evaluate and plot the profile likelihood for the
proportion of DNA contributed by individual K3 under the hypothesis
that the donors are K1, K2, K3, and an unknown contributor. </p>

<div class="chunk" id="profilelikelihood"><div class="rcode"><div class="source"><pre class="knitr r"><span class="hl std">proflik</span> <span class="hl kwb">&lt;-</span> <span class="hl kwa">function</span><span class="hl std">(</span><span class="hl kwc">x</span><span class="hl std">){</span>
    <span class="hl kwd">mixML</span><span class="hl std">(mixHp, mlHp</span><span class="hl opt">$</span><span class="hl std">mle,</span>
          <span class="hl kwc">constraints</span> <span class="hl std">=</span> <span class="hl kwa">function</span><span class="hl std">(</span><span class="hl kwc">p</span><span class="hl std">)p[[</span><span class="hl num">1</span><span class="hl std">,</span> <span class="hl str">&quot;phi&quot;</span><span class="hl std">]][[</span><span class="hl str">&quot;K3&quot;</span><span class="hl std">]],</span>
          <span class="hl kwc">val</span> <span class="hl std">= x)</span><span class="hl opt">$</span><span class="hl std">lik</span>
<span class="hl std">}</span>
<span class="hl std">proflik</span> <span class="hl kwb">&lt;-</span> <span class="hl kwd">Vectorize</span><span class="hl std">(proflik)</span>

<span class="hl kwd">curve</span><span class="hl std">(</span><span class="hl kwd">proflik</span><span class="hl std">(x)</span><span class="hl opt">-</span><span class="hl std">mlHp</span><span class="hl opt">$</span><span class="hl std">lik,</span> <span class="hl num">0.01</span><span class="hl std">,</span> <span class="hl num">0.2</span><span class="hl std">,</span> <span class="hl kwc">n</span><span class="hl std">=</span><span class="hl num">19</span><span class="hl std">,</span>
      <span class="hl kwc">xlab</span> <span class="hl std">=</span> <span class="hl kwd">expression</span><span class="hl std">(phi[K3]),</span> <span class="hl kwc">ylab</span> <span class="hl std">=</span> <span class="hl str">&quot;Profile likelihood&quot;</span><span class="hl std">)</span>
</pre></div>
</div><div class="rimage center"><img src="graphics/profilelikelihood-1.png" title="Profile likelihood for a mixture proportion" alt="Profile likelihood for a mixture proportion" class="plot" /></div></div>

<p> The profile likelihood illustrates clearly that the data support a
non-zero contribution from K3.</p>

