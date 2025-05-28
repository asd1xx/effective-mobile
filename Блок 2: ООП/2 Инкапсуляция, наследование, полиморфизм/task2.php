<?php

declare(strict_types=1);

class BankAccount
{
    public const int MIN_BALANCE = 0;

    protected float $balance;

    public function __construct(float $balance)
    {
        $this->setBalance($balance);
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $value): void
    {
        $this->balance = $value;
    }

    public function deposit(float $value): void
    {
        $this->balance += $value;
    }

    public function withdraw(float $value): void
    {
        if ($this->balance - $value < self::MIN_BALANCE) {
            print_r('Ошибка: недостаточно средств' . PHP_EOL);
            return;
        }

        $this->balance -= $value;
    }
}

class SavingsAccount extends BankAccount
{
    private float $percent;

    public function __construct(float $balance, float $percent)
    {
        parent::__construct($balance);
        $this->percent = $percent;
    }

    public function applyInterest(): void
    {
        $this->balance += $this->balance * $this->percent / 100;
    }
}

$savings = new SavingsAccount(1000, 5);
$savings->applyInterest();
echo $savings->getBalance() . PHP_EOL;
// ✅ 1050
