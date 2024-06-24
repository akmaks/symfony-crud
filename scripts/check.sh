#!/bin/sh

PHPCS_BIN="./vendor/bin/phpcs"
PHPSTAN="./vendor/bin/phpstan analyse -l 1 --memory-limit=1G --no-progress --configuration phpstan.dis.neon"
PHPMD="./vendor/bin/phpmd"

ALL_FILES=$(git diff --name-only --diff-filter=AM HEAD | grep .php)

if [ "$ALL_FILES" != "" ]
then
    echo "[PRE-COMMIT] Checking PHPCS..."

    $PHPCS_BIN -p $ALL_FILES

    if [ $? != 0 ]
    then
        echo "[PRE-COMMIT] Coding standards errors have been detected."
        exit 1
    fi

    echo "[PRE-COMMIT] Checking modified files with phpstan..."

    $PHPSTAN $ALL_FILES

    if [ $? != 0 ]
    then
      echo "[PRE-COMMIT] phpstan failed"
      exit 1
    fi

        echo "[PRE-COMMIT] Checking code smells with phpmd..."

        $PHPMD $ALL_FILES "text rulesets.xml"

        if [ $? != 0 ]
        then
          echo "[PRE-COMMIT] phpmd failed"
          exit 1
        fi
fi

exit $?
