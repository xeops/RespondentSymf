<?php

namespace App\Service\Shape;

use Psr\Log\LoggerInterface;

class Circle implements ShapeInterface
{
	private int $radius;
	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	public function draw(): string
	{
		return "";
	}

	public function setDimensions(int ...$args): Circle
	{
		$this->radius = current($args);
		return $this;
	}
}