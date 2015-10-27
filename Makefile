BIN="./vendor/bin"
CODE="./src/"
TESTS="./test/"
LINTER="${BIN}/phpcs"
RULESET="${TESTS}/linter_ruleset.xml"
RUNNER="${BIN}/phpunit"
RUNNER_FLAGS=--colors --include-path "./" --bootstrap "vendor/autoload.php" --report-useless-tests --strict-coverage --strict-global-state --disallow-test-output --enforce-time-limit --disallow-todo-tests 

lint:
	@$(LINTER) --standard=$(RULESET) $(CODE) 

test: lint
	@$(RUNNER) $(TESTS) $(RUNNER_FLAGS) 

install:
	@composer install

.PHONY: test lint install
