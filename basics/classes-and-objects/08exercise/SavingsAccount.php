<?php


class SavingsAccount
{
    private float $balance;
    private float $annualInterestRate;
    private float $deposited = 0;
    private float $withdrawn = 0;
    private float $interestEarned = 0;

    public function __construct(float $balance, float $annualInterestRate)
    {
        $this->balance = $balance;
        $this->annualInterestRate = $annualInterestRate;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getAnnualInterestRate(): float
    {
        return $this->annualInterestRate;
    }

    public function withdraw(float $withdrawAmount): void
    {
        $this->balance -= $withdrawAmount;
        $this->withdrawn += $withdrawAmount;
    }

    public function deposit(float $depositAmount): void
    {
        $this->balance += $depositAmount;
        $this->deposited += $depositAmount;
    }

    public function addMonthlyInterest(): void
    {
        $this->interestEarned += $this->balance * $this->getAnnualInterestRate() / 12 * 0.01;
        $this->balance += $this->balance * $this->getAnnualInterestRate() / 12 * 0.01;
    }

    public function getDeposited(): float
    {
        return $this->deposited;
    }

    public function getWithdrawn(): float
    {
        return $this->withdrawn;
    }

    public function getInterestEarned(): float
    {
        return $this->interestEarned;
    }

    public function format($num): float
    {
        return number_format($num, 2);
    }

}