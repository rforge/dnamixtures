installRHugin <- function(){
  if (Sys.getenv("HUGINHOME") == "")
    stop("Please set the HUGINHOME variable to point to your Hugin installation.")

  ## Dowloads the modified RHugin source package to a temporary directory
  ## and modifies the .onLoad function to contain the user-specific HUGINHOME location
  tmpdir <- paste(strsplit(tempdir(), split = "\\", fixed = TRUE)[[1]], collapse = .Platform$file.sep)
  untar("dnamixtures.r-forge.r-project.org/RHugin/RHuginWindows.tar.gz", exdir = tmpdir, compressed = "gzip")
  onLoad <- file.path(tmpdir, "RHugin/R/onLoad.q")
  ol <- readLines(onLoad)
  ol[grep("HUGINHOME <- NULL", ol)[1]] <- paste0("    HUGINHOME <- \"",
                                                 file.path(Sys.getenv("HUGINHOME")), "\"")
  writeLines(ol, onLoad)

  ## Installs the customized package
  install.packages(file.path(tmpdir, "RHugin"), repos = NULL, type = "source",
                   INSTALL_opts = "--no-multiarch")
}
installRHugin()
