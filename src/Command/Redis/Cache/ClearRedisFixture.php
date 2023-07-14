<?php

namespace App\Command\Redis\Cache;

use Predis\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearRedisFixture extends Command
{

	private Client $redis;

	public function __construct(Client $redis)
	{
		parent::__construct();
		$this->redis = $redis;
	}

	protected static $defaultName = 'app:clear-cache';

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
        $users = $this->redis->keys('REDIS_CACHE_USER:*');
        foreach ($users as $user)
        {
            $this->redis->del($user);
        }

		$output->writeln("Removed all elements from cache");
		return Command::SUCCESS;
	}
}