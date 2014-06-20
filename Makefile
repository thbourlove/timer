tags:
	ctags -R --fields=+aimS --languages=php --php-kinds=cidf --exclude=tests

cscope:
	find . -name '*.php' > ./cscope.files
	cscope -b
	rm cscope.files

test:
	phpunit --coverage-text

build:
	composer install

server:
	php -S 0.0.0.0:8000 -t examples/
