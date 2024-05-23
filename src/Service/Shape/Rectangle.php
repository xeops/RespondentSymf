<?php

namespace App\Service\Shape;

use Psr\Log\LoggerInterface;

class Rectangle implements ShapeInterface
{
	private int $height;
	private int $width;
	private LoggerInterface $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	/**
	 * @return string
	 *
	 * heigth = 3, width = 5
	 *      *****
	 *      *****
	 *      *****
	 */
	public function draw(): string
	{
		return "";
	}

	public function setDimensions(int ...$args): ShapeInterface
	{
		list($this->height, $this->width) = $args;
		return $this;
	}
}