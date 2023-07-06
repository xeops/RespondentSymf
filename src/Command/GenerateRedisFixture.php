<?php

namespace App\Command;

use Predis\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class GenerateRedisFixture extends Command
{
	private \Predis\Client $redis;

	public function __construct(\Predis\Client $redis)
	{
		parent::__construct();

		$this->redis = $redis;
	}

	protected static $defaultName = 'app:generate-cache';

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		return Command::SUCCESS;
	}
}