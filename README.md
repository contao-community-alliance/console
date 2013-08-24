Console Integration
===================

Register you console command classes in `$GLOBALS['CONSOLE_CMD']` within your `config.php`.

**config.php**
```php
<?php

$GLOBALS['CONSOLE_CMD'][] = 'Acme\Command\GreetCommand';
```

**GreetCommand.php**
```
<?php

namespace = Acme\Command;

class GreetCommand extends \Symfony\Component\Console\Command\Command
{
	protected function configure()
	{
		$this
			->setName('demo:greet')
			->setDescription('Greet someone')
			->addArgument(
				'name',
				InputArgument::OPTIONAL,
				'Who do you want to greet?'
			)
			->addOption(
				'yell',
				null,
				InputOption::VALUE_NONE,
				'If set, the task will yell in uppercase letters'
			)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$name = $input->getArgument('name');
		if ($name) {
			$text = 'Hello '.$name;
		} else {
			$text = 'Hello';
		}

		if ($input->getOption('yell')) {
			$text = strtoupper($text);
		}

		$output->writeln($text);
	}
}
```

If you need a more complex setup routine, use the `initializeConsole` hook.

**config.php**
```php
<?php

$GLOBALS['TL_HOOKS']['initializeConsole'][] = array('Acme\Console', 'myInitializeConsole');
```

**Console.php**
```php
<?php

namespace Acme;

use Symfony\Component\Console\Application;
use Acme\Command\GreetCommand;

class Console
{
	public function myInitializeConsole(Application $application)
	{
		$application->add(new GreetCommand());
	}
}
```

For details see http://symfony.com/doc/2.3/components/console/introduction.html
