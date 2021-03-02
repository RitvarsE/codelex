<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        if ($month > 12 || $month < 1 || $day > 31 || $day < 1 || $year < 0) {
            return;
        }
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }


    public function getMonth(): int
    {
        return $this->month;
    }


    public function setMonth(int $month): void
    {
        if ($month > 12 || $month < 1) {
            return;
        }
        $this->month = $month;
    }


    public function getDay(): int
    {
        return $this->day;
    }


    public function setDay(int $day): void
    {
        if ($day > 31 || $day < 1) {
            return;
        }
        $this->day = $day;
    }


    public function getYear(): int
    {
        return $this->year;
    }


    public function setYear(int $year): void
    {
        if ($year < 0) {
            return;
        }
        $this->year = $year;
    }

}