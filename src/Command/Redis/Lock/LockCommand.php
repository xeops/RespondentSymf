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
		
	}
}