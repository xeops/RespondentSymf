<?php

namespace App\Service\Shape;

use Psr\Log\LoggerInterface;

class Triangle implements ShapeInterface
{
	private int $sideOneLength;
	private int $sideTwoLength;
	private int $sideThreeLength;

	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	public function draw(): string
	{
		return "";
	}

	public function setDimensions(int ...$args): ShapeInterface
	{
		list($this->sideOneLength, $this->sideTwoLength, $this->sideThreeLength) = $args;
	}
}