<?php

class SlotMachine
{
    public string $name;
    private array $elements = ['*' => 1, '#' => 2, '$' => 3, '@' => 4, '%' => 5, '!' => 100];
    private array $gameBoard = [];
    private int $balance = 0;
    private int $bet = 0;
    private int $freeGame = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance($moneyToPlay): void
    {
        $this->balance = $moneyToPlay;
    }

    public function getBet(): int
    {
        return $this->bet;
    }

    public function setBet(string $addBet): void
    {
        $this->bet = $addBet;
    }

    public function getGameBoard(): array
    {
        return $this->gameBoard;
    }

    public function addElements(string $element, int $coefficient): void
    {
        if (array_key_exists($element, $this->elements)) {
            echo 'This symbol already exists' . PHP_EOL;
        } else {
            $this->elements[$element] = $coefficient;
        }
    }

    public function game(): void
    {
        $this->gameBoard = [];
        for ($x = 0; $x < 3; $x++) {
            array_push($this->gameBoard, [array_rand($this->elements), array_rand($this->elements), array_rand($this->elements)]);
        }
        $this->balance -= $this->bet;
    }

    public function checkLine(): void
    {
        //horizontal wins
        if ($this->gameBoard[0][0] == $this->gameBoard[0][1] && $this->gameBoard[0][1] == $this->gameBoard[0][2]) {
            if ($this->gameBoard[0][0] == array_search(100, $this->elements)) {
                $this->freeGame++;
            } else {
                $this->balance += $this->elements[$this->gameBoard[0][0]] * $this->bet;
            }
        }
        if ($this->gameBoard[1][0] == $this->gameBoard[1][1] && $this->gameBoard[1][1] == $this->gameBoard[1][2]) {
            if ($this->gameBoard[1][0] == array_search(100, $this->elements)) {
                $this->freeGame++;
            } else {
                $this->balance += $this->elements[$this->gameBoard[1][0]] * $this->bet;
            }
        }
        if ($this->gameBoard[2][0] == $this->gameBoard[2][1] && $this->gameBoard[2][1] == $this->gameBoard[2][2]) {
            if ($this->gameBoard[2][0] == array_search(100, $this->elements)) {
                $this->freeGame++;
            } else {
                $this->balance += $this->elements[$this->gameBoard[2][0]] * $this->bet;
            }
        }
        //diagonal wins

        if ($this->gameBoard[0][0] == $this->gameBoard[1][1] && $this->gameBoard[1][1] == $this->gameBoard[2][2]) {
            if ($this->gameBoard[0][0] == array_search(100, $this->elements)) {
                $this->freeGame++;
            } else {
                $this->balance += $this->elements[$this->gameBoard[0][0]] * $this->bet;
            }
        }
        if ($this->gameBoard[0][2] == $this->gameBoard[1][1] && $this->gameBoard[1][1] == $this->gameBoard[2][0]) {
            if ($this->gameBoard[0][2] == array_search(100, $this->elements)) {
                $this->freeGame++;
            } else {
                $this->balance += $this->elements[$this->gameBoard[0][2]] * $this->bet;
            }
        }
    }

    public function freeGame(): void
    {
        if ($this->freeGame > 0) {
            $this->freeGame = 0;
            $this->balance += $this->bet;
            $this->game();
            $this->balance += $this->bet;
            $this->game();
            $this->balance += $this->bet;
            $this->game();
            $this->balance += $this->bet;
            $this->game();
            $this->balance += $this->bet;
            $this->game();
        }
    }

}