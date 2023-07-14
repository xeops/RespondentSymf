<?php

namespace App\Command\Redis\Cache;

use App\Model\User\User;
use App\Model\User\UsersGenerator;
use Predis\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class GenerateRedisFixture extends Command
{
	protected function configure(): void
	{
		$this
            ->addArgument('database', InputArgument::REQUIRED, 'Specified database for user cache')
			->addArgument('count', InputArgument::OPTIONAL, 'Count of users to create', 10000);
	}

	private Client $redis;

	public function __construct(Client $redis)
	{
		parent::__construct();
		$this->redis = $redis;
	}

	protected static $defaultName = 'app:generate-cache';

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
        $this->redis->select($input->getArgument('database'));

		foreach (UsersGenerator::generateUsers($input->getArgument('count')) as $user)
		{
			$this->createCache($user);
		}
		return Command::SUCCESS;
	}

	private function createCache(User $user): void
	{
		$this->redis->set("REDIS_CACHE_USER:{$user->getId()}", $user->getName());
	}
}