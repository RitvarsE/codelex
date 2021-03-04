<?php


class Account
{
    private string $name;
    private int $balance;

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getBalance(): int
    {
        return $this->balance;
    }

    public function withdrawal(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }
    public function transfer(Account $to, int $howMuch): void
    {
        $this->withdrawal($howMuch);
        $to->deposit($howMuch);
    }

}