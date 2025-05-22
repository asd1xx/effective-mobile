<?php

declare(strict_types=1);

interface Fuelable
{
    public function refuel(): void;
}

abstract class Vehicle
{
    abstract public function move(): void;
}

class Car extends Vehicle implements Fuelable
{
    public function move(): void
    {
        print_r('Машина едет' . PHP_EOL);
    }

    public function refuel(): void
    {
        print_r('Машина заправлена' . PHP_EOL);
    }
}

class Bike extends Vehicle
{
    public function move(): void
    {
        print_r('Велосипед едет' . PHP_EOL);
    }
}

$car = new Car();
$car->move();
// ✅ "Машина едет"

$car->refuel();
// ✅ "Машина заправлена"

$bike = new Bike();
$bike->move();
// ✅ "Велосипед едет"
