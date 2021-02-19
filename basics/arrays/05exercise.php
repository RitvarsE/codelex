<?php

function display_board()
{
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
}


display_board();
function firstPlayerMove($firstPlayer): int
{
    return $firstPlayer = readline("'X', choose your location (row, column): ");
}

function secondPlayerMove($secondPlayer)
{
    return $secondPlayer = readline("'O', choose your location (row, column): ");
}

function newBoard(): array
{
    return $board = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
}
$board = [
    ['-', '-', '-'],
    ['-', '-', '-'],
    ['-', '-', '-']
];
foreach($board as $line) {
};