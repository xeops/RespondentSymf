<?php

namespace App\Command\Redis\Lock;

use Predis\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LockCommand extends Command
{
	private Client $redis;

	public function __construct(Client $redis)
	{
		parent::__construct();
		$this->redis = $redis;
	}

	protected static $defaultName = 'app:single';

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
        $lock = $this->redis->set('APP_SINGLE_LOCK', 1, 'NX', 'EX', 10);
        if (!$lock)
        {
            $output->writeln("Already running");
            return Command::SUCCESS;
        }

		sleep(10);
		$output->writeln("Proceed");
		return Command::SUCCESS;
	}
}