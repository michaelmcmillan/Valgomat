RUNNER="./vendor/phpunit/phpunit/phpunit"
TESTS="./test/"

test:
	@$(RUNNER) $(TESTS)

.PHONY: test
