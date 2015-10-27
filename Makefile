BIN="./vendor/bin"
CODE="./src/"
TESTS="./test/"
LINTER="${BIN}/phpcs"
LINTER_FLAGS=--standard="${TESTS}/linter_ruleset.xml"
IGNORE=grep -v 'Sebastian Bergmann'
RUNNER="${BIN}/phpunit"
RUNNER_FLAGS=--colors --include-path "./" --bootstrap "vendor/autoload.php" \
			 --report-useless-tests --strict-coverage --strict-global-state \
			 --disallow-test-output --enforce-time-limit --disallow-todo-tests 

lint:
	@$(LINTER) $(LINTER_FLAGS) $(CODE) 

test: lint
	@$(RUNNER) $(TESTS) $(RUNNER_FLAGS) | $(IGNORE)

install:
	@composer install

.PHONY: test lint install
