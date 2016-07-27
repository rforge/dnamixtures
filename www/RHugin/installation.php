<p>Download and install <a href="http://cran.r-project.org/bin/windows/Rtools/">RTools</a>.
Accept all the defaults, in particular that Cygwin dlls are installed
and that the PATH variable is changed. </p>

<p>Now open R (or RStudio) and do the following:</p>

<p>Set the variable HUGINHOME to point to the location of Hugin,
changing the file path to match the specific location and version on your system. If you
run 64-bit R, then you should use the 64-bit Hugin.</p>

<p class="code"> 
Sys.setenv(HUGINHOME = "C:/Program Files/Hugin Expert/Hugin Dist 8.3 (x64)")   ## 64 bit </br>
## Sys.setenv(HUGINHOME = "C:/Program Files (x86)/Hugin Expert/Hugin Dist 8.3")  ## 32 bit
</p>

Install RHugin
<p class="code"> 
source("http://dnamixtures.r-forge.r-project.org/RHugin/RHuginWindowsInstaller.R")
</p>


<p>You can check whether R is 64 or 32 bit by</p>
<p class="code"> 
R.Version()$arch
</p>
<p>Here "x86_64" means 64 bit and "i386" means 32 bit.</p>



