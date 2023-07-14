<?php

namespace App\Command\Redis\Cache;

use Predis\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearRedisFixture extends Command
{
    protected function configure(): void
    {
        $this->addArgument('database', InputArgument::REQUIRED, 'Specified database for user cache');
    }

    private Client $redis;

	public function __construct(Client $redis)
	{
		parent::__construct();
		$this->redis = $redis;
	}

	protected static $defaultName = 'app:clear-cache';

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
        $this->redis->select($input->getArgument('database'));
        $this->redis->flushdb();

		$output->writeln("Removed all elements from cache");
		return Command::SUCCESS;
	}
}