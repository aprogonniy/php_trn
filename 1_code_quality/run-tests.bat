@echo off

if not exist tests-results mkdir tests-results

cd vendor/bin

rem run phploc test
call phploc  --count-tests ../../src > ../../tests-results/phploc.txt
echo phploc test done

rem run pdepend test
call pdepend  --summary-xml=../../tests-results/pdepend-summary.xml ../../src > ../../tests-results/pdepend-log.txt
echo pdepend test done

rem run phpmd test
call phpmd ../../src text codesize,unusedcode,naming > ../../tests-results/phpmd.txt
echo phpmd test done

rem run phpcpd test
call phpcpd ../../src > ../../tests-results/phpcpd.txt
echo phpcpd test done

cd ../..

PAUSE