@echo off

cd ../../xampp/php

#config pear root paths
call pear config-set doc_dir C:\development-PHPTRN\xampp\php\pear
call pear config-set cfg_dir C:\development-PHPTRN\xampp\php\pear
call pear config-set data_dir C:\development-PHPTRN\xampp\php\pear
call pear config-set test_dir C:\development-PHPTRN\xampp\php\pear
call pear config-set www_dir C:\development-PHPTRN\xampp\php\pear

#install phpcs
call pear install PHP_CodeSniffer

#check that it works
call phpcs --version

PAUSE