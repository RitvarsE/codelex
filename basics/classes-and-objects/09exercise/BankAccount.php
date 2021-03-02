<?php


class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function showUserNameAndBalance(): string
    {
        return $this->balance < 0 ? $this->getName() . ', -$' . number_format($this->getBalance() * -1, 2) :
            $this->getName() . ', $' . number_format($this->getBalance(), 2);
    }
}