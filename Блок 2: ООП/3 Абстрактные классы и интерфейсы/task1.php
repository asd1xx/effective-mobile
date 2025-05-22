<?php

declare(strict_types=1);

abstract class Shape
{
    abstract public function getArea(): float;
}

class Rectangle extends Shape
{
    private float $sideOne;
    private float $sideTwo;

    public function __construct(float $sideOne, float $sideTwo)
    {
        $this->sideOne = $sideOne;
        $this->sideTwo = $sideTwo;
    }

    public function getArea(): float
    {
        return $this->sideOne * $this->sideTwo;
    }
}

class Circle extends Shape
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return round(M_PI * ($this->radius ** 2), 2);
    }
}

$rect = new Rectangle(10, 5);
echo $rect->getArea() . PHP_EOL;
// ✅ 50

$circle = new Circle(7);
echo $circle->getArea() . PHP_EOL;
// ✅ 153.94 (пример для π * r²)
