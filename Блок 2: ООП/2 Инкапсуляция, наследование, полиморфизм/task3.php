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

class CreditAccount extends BankAccount
{
    public const int MIN_CREDIT_BALANCE = -500;

    public function withdraw(float $value): void
    {
        if ($this->balance - $value < self::MIN_CREDIT_BALANCE) {
            print_r('Ошибка: допустимый минус превышен' . PHP_EOL);
            return;
        }

        $this->balance -= $value;
    }
}

$credit = new CreditAccount(1000);
$credit->withdraw(1500);
echo $credit->getBalance() . PHP_EOL;
// ✅ -500 (допустимый минус)
