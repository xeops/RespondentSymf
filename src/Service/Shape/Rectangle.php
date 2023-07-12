<?php

namespace App\Service\Shape;

use Psr\Log\LoggerInterface;

class Rectangle implements ShapeInterface
{
	private int $length;
	private int $width;
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
		list($this->length, $this->width) = $args;
		return $this;
	}
}