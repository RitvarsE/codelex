<?php
$board = [
    ['-', '-', '-'],
    ['-', '-', '-'],
    ['-', '-', '-']
];
function startGame($board)
{
    while (!isWinner($board)) {

        $countX = 0;
        $countY = 0;
        foreach ($board as $row) {
            foreach ($row as $key => $cell) {
                if ($key == 2) {
                    echo $cell . PHP_EOL;
                } else {
                    echo $cell . ' ';
                }
                if ($cell === 'x') {
                    $countX++;
                }
                if ($cell === 'o') {
                    $countY++;
                }
            }
        }
        if ($countX > $countY) {
            $whoseTurn = 'o';
        } else {
            $whoseTurn = 'x';
        }
        if ($countX === 5 && !isWinner($board)) {
            echo 'The game is tied.';
            exit;
        }
        $playerInput = readline('It`s your turn ' . $whoseTurn . ' type in row column(sensitive input): ');
        $splitInput = explode(' ', $playerInput);
        if (strlen($playerInput) > 3
            || $splitInput[0] > 2
            || $splitInput[0] < 0
            || $splitInput[1] > 2
            || $splitInput[1] < 0
            || $board[$splitInput[0]][$splitInput[1]] !== '-'
            || $playerInput[1] !== ' ') {
            echo 'Remember it`s type sensitive. You must write row,column and variables are from 0 till 2' . PHP_EOL;
        } else {
            array_splice($board[$splitInput[0]], $splitInput[1], 1, $whoseTurn);
        }
    }
    echo isWinner($board);
}

function isWinner($board)
{
    if ($board[0][0] !== '-' && $board[0][0] === $board[0][1] && $board[0][0] === $board[0][2]) {
        return $board[0][0] . ' won the game';
    }
    if ($board[1][0] !== '-' && $board[1][0] === $board[1][1] && $board[1][0] === $board[1][2]) {
        return $board[1][0] . ' won the game';
    }
    if ($board[2][0] !== '-' && $board[2][0] === $board[2][1] && $board[2][0] === $board[2][2]) {
        return $board[2][0] . ' won the game';
    }
    if ($board[0][0] !== '-' && $board[0][0] === $board[1][0] && $board[0][0] === $board[2][0]) {
        return $board[0][0] . ' won the game';
    }
    if ($board[0][1] !== '-' && $board[0][1] === $board[1][1] && $board[0][1] === $board[2][1]) {
        return $board[0][1] . ' won the game';
    }
    if ($board[0][2] !== '-' && $board[0][2] === $board[1][2] && $board[0][2] === $board[2][2]) {
        return $board[0][2] . ' won the game';
    }
    if ($board[0][0] !== '-' && $board[0][0] === $board[1][1] && $board[0][0] === $board[2][2]) {
        return $board[0][0] . ' won the game';
    }
    if ($board[0][2] !== '-' && $board[0][2] === $board[1][1] && $board[0][2] === $board[2][0]) {
        return $board[0][2] . ' won the game';
    }
}

startGame($board);