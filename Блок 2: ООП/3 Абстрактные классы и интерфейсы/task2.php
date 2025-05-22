<?php

declare(strict_types=1);

interface Drawable
{
    public function draw(): void;
}

abstract class Shape implements Drawable
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

    public function draw(): void
    {
        print_r("Рисую прямоугольник шириной {$this->sideOne} и высотой {$this->sideTwo}" . PHP_EOL);
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

    public function draw(): void
    {
        print_r("Рисую круг радиусом {$this->radius}" . PHP_EOL);
    }
}

$rect = new Rectangle(10, 5);
$rect->draw();
// ✅ "Рисую прямоугольник шириной 10 и высотой 5"

$circle = new Circle(7);
$circle->draw();
// ✅ "Рисую круг радиусом 7"
