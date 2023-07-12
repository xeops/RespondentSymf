<?php

namespace App\Command\DataBase;

use App\Entity\User;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\TransactionIsolationLevel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IsolationsCommand extends Command
{

	protected function configure(): void
	{
		$this
			->addArgument('sleep', InputArgument::OPTIONAL, 'Time to sleep in sec.', 1);
	}


	protected static $defaultName = "app:db:isolation";

	private EntityManagerInterface $entityManager;

	public function __construct(EntityManagerInterface $entityManager)
	{
		parent::__construct();

		$this->entityManager = $entityManager;
	}

	/**
	 * @throws \Exception
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->entityManager->getConnection()->setTransactionIsolation(TransactionIsolationLevel::READ_UNCOMMITTED);

		$this->entityManager->beginTransaction();

		$user = new User();
		$user->setName("User:" . random_int(0, 100));

		$this->entityManager->persist($user);
		$this->entityManager->flush();
		$output->writeln("{$user->getId()}\t\t{$user->getName()} created");
		sleep($input->getArgument('sleep'));

		$this->entityManager->commit();

		$users = $this->entityManager->getRepository(User::class)->findAll();

		foreach ($users as $user)
		{
			$output->writeln("{$user->getId()}\t\t{$user->getName()}");
		}

		return Command::SUCCESS;
	}
}