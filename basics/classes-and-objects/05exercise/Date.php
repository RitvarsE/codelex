<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }


    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }


    public function getYear(): int
    {
        return $this->year;
    }


    public function setDate(int $month, int $day, int $year): void
    {
        if (!checkdate($month, $day, $year)) {
            return;
        }
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

}