.ONESHELL:
SHELL := /usr/bin/env sh
ROOT_DIR:=$(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))
.DEFAULT: help
.PHONY: help
ifndef VERBOSE
.SILENT:
endif

phpunit:
	echo 'Running phpunit...'
	php ./vendor/bin/phpunit --prepend "./tests/unit/xdebug-filter.php"

phplint:
	echo 'Running phplint...'
	php ./vendor/bin/phplint

phpstan:
	echo 'Running phpstan...'
	php -d memory-limit=128M ./vendor/bin/phpstan analyse

psalm:
	php vendor/bin/psalm --show-info=true

phpcs:
	echo 'Running codesniffer...'
	php ./vendor/bin/phpcs --runtime-set ignore_warnings_on_exit true --cache -p src tests

phpcbf:
	php ./vendor/bin/phpcbf -p --runtime-set ignore_warnings_on_exit true