<?php

declare(strict_types=1);

class Car
{
    private string $brand;
    private string $model;
    private int $year;

    public function __construct(string $brand, string $model, int $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function setYear(int $value): void
    {
        $this->year = $value;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getCarInfo(): string
    {
        return "{$this->brand} {$this->model}, {$this->year}";
    }
}

$car = new Car("Toyota", "Camry", 2020);
$car->setYear(2022);
echo $car->getYear() . PHP_EOL;
// ✅ 2022
