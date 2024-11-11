SETUP:
* to use, simply run
```docker compose up -d ```
and open localhost

phpstan:
```vendor/bin/phpstan analyse src tests --level 9```

tests:
```./vendor/bin/phpunit tests```