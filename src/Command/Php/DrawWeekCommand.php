<?php

namespace App\Command\Php;

use App\Model\Calendar;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DrawWeekCommand extends Command
{
	protected static $defaultName = 'app:draw-week';


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$calendar = new Calendar(new \DateTime());

		for ($i = 0; $i < 7; $i++)
		{
			$output->writeln((clone $calendar)->getDateTime()->modify('+1 day')->format('Y-m-d'));
		}

		$output->writeln("Next 7 days for {$calendar->getDateTime()->format('Y-m-d')} calculated");
		return Command::SUCCESS;
	}
}
