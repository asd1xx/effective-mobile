<?php

declare(strict_types=1);

interface Payable
{
    public function pay(float $amount): void;
}

class BankAccount implements Payable
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

    public function pay(float $amount): void
    {
        if ($this->balance - $amount < self::MIN_BALANCE) {
            print_r('Ошибка: недостаточно средств' . PHP_EOL);
            return;
        }

        $this->balance -= $amount;
        print_r("Баланс уменьшился на {$amount}" . PHP_EOL);
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

    public function pay(float $amount): void
    {
        if ($this->balance - $amount < self::MIN_CREDIT_BALANCE) {
            print_r('Ошибка: недостаточно средств' . PHP_EOL);
            return;
        }

        $this->balance -= $amount;
        print_r("Баланс ушел в {$this->balance} (кредитный лимит)" . PHP_EOL);
    }
}

$bank = new BankAccount(500);
$credit = new CreditAccount(500);

$bank->pay(200);
// ✅ Баланс уменьшился на 200

$credit->pay(700);
// ✅ Баланс ушел в -200 (кредитный лимит)
