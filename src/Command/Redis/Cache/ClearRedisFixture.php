<?php

namespace App\Command\Redis\Cache;

use App\Model\User\UserRedisHelper;
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
        $userKeys = $this->redis->get(UserRedisHelper::REDIS_CACHE_KEY);
        $users = UserRedisHelper::decodeUserKeys($userKeys);
        $this->redis->del($users);

		$output->writeln("Removed all elements from cache");
		return Command::SUCCESS;
	}
}