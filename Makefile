RUNNER="./vendor/phpunit/phpunit/phpunit"
TEST_DIR="./test/unit/"

test:
	@$(RUNNER) $(TEST_DIR)

.PHONY: test
