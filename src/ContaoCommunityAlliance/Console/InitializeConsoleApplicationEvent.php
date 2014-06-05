<?php

/**
 * Console application for Contao Open Source CMS
 * Copyright (C) 2013,2014 Contao Community Alliance
 *
 * PHP version 5
 *
 * @copyright  Contao Community Alliance 2013,2014
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @package    contao-community-alliance/console
 * @license    LGPL
 * @filesource
 */

namespace ContaoCommunityAlliance\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\EventDispatcher\Event;

class InitializeConsoleApplicationEvent extends Event
{
	/**
	 * @var Application
	 */
	protected $application;

	function __construct($application)
	{
		$this->application = $application;
	}

	/**
	 * @return Application
	 */
	public function getApplication()
	{
		return $this->application;
	}
}
