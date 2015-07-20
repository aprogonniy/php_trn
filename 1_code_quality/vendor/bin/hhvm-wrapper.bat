@ECHO OFF
SET BIN_TARGET=%~dp0/../sebastian/hhvm-wrapper/hhvm-wrapper
php "%BIN_TARGET%" %*
