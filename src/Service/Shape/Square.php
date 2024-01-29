<?php

namespace App\Service\Shape;

use Psr\Log\LoggerInterface;

class Square implements ShapeInterface
{
	private int $sideLength;
	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	/**
	 * @return string
	 *
	 * sideLength = 5
	 *
	 *  *****
	 *  *****
	 *  *****
	 *  *****
	 *  *****
	 */
	public function draw(): string
	{
		return "";
	}

	public function setDimensions(int ...$args): ShapeInterface
	{
		$this->sideLength = current($args);
		return $this;
	}
}