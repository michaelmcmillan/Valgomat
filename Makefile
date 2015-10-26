BIN="./vendor/bin"
CODE="./src/"
TESTS="./test/"
LINTER="${BIN}/phpcs"
RUNNER="${BIN}/phpunit"

lint:
	@$(LINTER) --standard=ruleset.xml $(CODE) 

test: lint
	@$(RUNNER) $(TESTS)

.PHONY: test lint beautify
