<?php

declare(strict_types=1);

trait Loggable
{
    public function log(string $message): void
    {
        print_r("[LOG]: {$message}" . PHP_EOL);
    }
}

class Car
{
    use Loggable;

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

$car = new Car("Ford", "Focus", 2019);
$car->log("Запущен двигатель");
// ✅ "[LOG]: Запущен двигатель"
