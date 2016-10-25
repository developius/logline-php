# LogLine-PHP
LogLine is an entirely web-based logging platform. This PHP library interfaces with it to allow you to utilise LogLine in your PHP applications.

## Installation

```
composer require finnian/logline-php
```

## Example usage

```php
$logline = new LogLine("your-api-key");

if ($logline->info("I'm a sucker for LogLine")){
	echo "Log of type info succeeded\n";
}
if ($logline->success("Yeah! It worked")){
	echo "Log of type success succeeded\n";
}
if ($logline->warning("Be careful with that")){
	echo "Log of type warning succeeded\n";
}
if ($logline->fatal("Oh man, this is bad")){
	echo "Log of type fatal succeeded\n";
}
```

## Tests

There is a [test script](test.php) included for testing purposes, it may prove useful, or it may not.
