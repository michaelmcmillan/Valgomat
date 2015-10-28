BIN="./vendor/bin"
CODE="./src/"
TESTS="./test/"
LINTER="${BIN}/phpcs"
LINTER_FLAGS=--standard="${TESTS}/linter_ruleset.xml"
IGNORE=grep -v 'Sebastian Bergmann'
RUNNER="${BIN}/phpunit"
RUNNER_FLAGS=--colors --include-path "./" --bootstrap "vendor/autoload.php" \
			 --strict-coverage --strict-global-state --disallow-todo-tests  \
			 --disallow-test-output --enforce-time-limit  

lint:
	@$(LINTER) $(LINTER_FLAGS) $(CODE) $(TESTS)

test: lint
	@$(RUNNER) $(TESTS) $(RUNNER_FLAGS) | $(IGNORE)

install:
	@composer install

serve:
	@php -S localhost:1337 src/Webserver/index.php

.PHONY: test lint install
