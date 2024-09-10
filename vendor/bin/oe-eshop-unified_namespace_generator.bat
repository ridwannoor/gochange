@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/oe-eshop-unified_namespace_generator
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
php "%BIN_TARGET%" %*
