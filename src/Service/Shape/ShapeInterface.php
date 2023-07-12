<?php

namespace App\Service\Shape;

interface ShapeInterface
{
	public function setDimensions(int ...$args) : ShapeInterface;

	public function draw(): string;
}