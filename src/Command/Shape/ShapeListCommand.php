<?php

namespace App\Command\Shape;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShapeListCommand extends Command
{
	protected static $defaultName = 'app:shape:list';

	public function __construct()
	{
		parent::__construct();
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		//TODO вывести список всех фигур

		return Command::SUCCESS;
	}
}
