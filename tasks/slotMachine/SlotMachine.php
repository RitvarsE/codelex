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

    public function startGame($moneyToPlay): void
    {
        do {
            if (is_numeric($moneyToPlay)) {
                if (fmod($moneyToPlay, 1) == 0) {
                    $moneyToPlay;
                } else {
                    $moneyToPlay = '';
                }
            } else {
                $moneyToPlay = '';
            }
        } while (!is_numeric($moneyToPlay));
        $this->balance = $moneyToPlay;
        $this->bet();
    }

    public function getBet(): int
    {
        return $this->bet;
    }

    public function setBet($addBet)
    {
        $this->bet = $addBet;
    }

    public function bet(): void
    {
        echo 'Your sum: ' . $this->getBalance() . PHP_EOL;
        do {
            $bet = readline('Choose your bet(Increment 10): ');
            if ($bet <= $this->balance && is_numeric($bet) && $bet % 10 === 0) {
                if (fmod($bet, 1) == 0) {
                    $bet;
                } else {
                    $bet = '';
                }
            } else {
                $bet = '';
            }
        } while (!is_numeric($bet));
        $this->bet = $bet;
        $this->game();
    }

    public function getElements(): string
    {
        $line = '';
        foreach ($this->elements as $element => $coefficient) {
            $line .= " $element - $coefficient |";
        }
        return '|' . $line;
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
            $echoGameBoard = $this->gameBoard;
            echo implode(' ', $echoGameBoard[$x]) . PHP_EOL;
            sleep(1);
        }
        $this->balance -= $this->bet;
        $this->checkLine();
        echo 'You have left: ' . $this->balance . PHP_EOL;
        $this->freeGame();
        $this->continue();

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

    public function continue(): void
    {

        if ($this->balance >= $this->bet) {
            $continue = readline('Continue?(y/n) ');
            if ($continue === 'y') {
                $changeBet = readline('Change bet(y/n). Your bet: ' . $this->bet . ': ');
                if ($changeBet == 'y') {
                    $this->bet();
                } else {
                    $this->game();
                }
            }
        } elseif ($this->balance == 0) {
            echo 'You lost all your money!';
        } else {
            echo 'Your bet is higher then your sum: ' . $this->balance . PHP_EOL;
            $quitOrChangeBet = readline('Quit or change bet(q or bet)');
            if ($quitOrChangeBet == 'bet') {
                $this->bet();
            } else {
                echo 'See you next time. Withdraw: ' . $this->balance;
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
            $this->continue();
        }
    }

}