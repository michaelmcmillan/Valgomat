BIN="./vendor/bin"
CODE="./src/"
TESTS="./test/"
LINTER="${BIN}/phpcs"
RULESET="${TESTS}/ruleset.xml"
RUNNER="${BIN}/phpunit"

lint:
	@$(LINTER) --standard=$(RULESET) $(CODE) 

test: lint
	@$(RUNNER) $(TESTS) --colors --include-path "./" --bootstrap "vendor/autoload.php"

.PHONY: test lint beautify
