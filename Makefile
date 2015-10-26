BIN="./vendor/bin"
CODE="./src/"
TESTS="./test/"
LINTER="${BIN}/phpcs"
RULESET="${TESTS}/ruleset.xml"
RUNNER="${BIN}/phpunit"

lint:
	@$(LINTER) --standard=$(RULESET) $(CODE) 

test: lint
	@$(RUNNER) $(TESTS)

.PHONY: test lint beautify
