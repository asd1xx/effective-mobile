<?php

declare(strict_types=1);

class BankAccount
{
    public const int MIN_BALANCE = 0;

    private float $balance;

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

$account = new BankAccount(1000);
$account->deposit(500);
echo $account->getBalance() . PHP_EOL;
// ✅ 1500

$account->withdraw(300);
echo $account->getBalance() . PHP_EOL;
// ✅ 1200

$account->withdraw(5000);
// ❌ Ошибка: недостаточно средств
