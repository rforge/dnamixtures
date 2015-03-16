<h1> Installing DNAmixtures </h1>

Once the dependencies are installed (see below), the most recent version of <span class="rpkg">DNAmixtures</span> can be installed by
<p class="code">
install.packages("DNAmixtures", repos = "http://dnamixtures.r-forge.r-project.org/", <br/>
		 type = "source", INSTALL_opts = "--no-multiarch")
</p>

<p> Note that older versions of <span class="rpkg">DNAmixtures</span> are still available for download
from <a href="src/contrib/">Rforge</a>.</p>

<h2> Getting started </h2>

<p>The package help page contains the most essential information as
well as an example analysis.</p>

<p class="code">
library(DNAmixtures) ## load the package<br/>
help(DNAmixtures)    ## main help page
</p>

The initial part of the example -- involving only known contributors
-- can be run with the trial version of Hugin, whereas the second part
substituting known contributor for an unknown contributor requires a
full licenced version of Hugin.

<h1> Installing Dependencies </h1>

<h2> Hugin: Efficient computations in Bayesian networks </h2>

<p> When a hypothesis includes any unknown contributors, there is a
need for summation over a large number of possible allocations of
genotypes. Our implementation relies on the <a href =
"http://www.hugin.com">Hugin</a> software for performing such
computations. </p>

<h3>Which license do I need?</h3>
<p> The package has been developed under a Hugin Researcher license and relies on the Hugin C API.</p>

<p> <span class="rpkg">DNAmixtures</span> may be installed with the
free version of Hugin, HuginLite, though due to a limitation in the
size of networks allowed by the free version, in practice this will
restrict the functionality in <span class="rpkg">DNAmixtures</span> to
mixtures with no unknown contributors.  </p>

<p>The package should also be compatible with e.g. Hugin Developer, which provides the full Hugin C API with no limitations in network size, though this has not been tested.</p>

<p>Hugin is solely used for performing computations on the Bayesian
networks created by <span class="rpkg">DNAmixtures</span> and, in
principle, another engine could be used in place of Hugin; however,
this is currently not supported.  </p>


<h2>The RHugin package: an API for working with Hugin in R</h2>

<p> <span class="rpkg">DNAmixtures</span> calls Hugin through the API
provided in the <a href ="http://rhugin.r-forge.r-project.org/"><span
class="rpkg">RHugin</span></a> package, meaning that the user can
easily manipulate the Bayesian networks directly from R.</p>

<p>
See the <a href = "http://rhugin.r-forge.r-project.org/">RHugin
package homepage</a> on how to install RHugin and its dependencies.
</p>

<p> Note that, under Windows, it is important that the version of
RHugin follows that of Hugin.</p>

<h2> Installing other dependencies in R</h2>

<span class="rpkg">DNAmixtures</span> depends on R packages Rsolnp, Matrix, and numDeriv. Usually these are automatically installed, but otherwise they can be obtained by

<p class="code"> install.packages(c("Rsolnp","Matrix", "numDeriv")) </p>

