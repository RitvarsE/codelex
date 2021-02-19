<?php
//jāuztaisa uzvaras opcijas un pārbaudīt ar tām, lai IF ir daudz īsāks.
//$winoptions = [['ROCK', 'SCISSORS'], ['SCISSORS', 'PAPER'], ['PAPER', 'ROCK']];
$options = ['ROCK', 'PAPER', 'SCISSORS'];
$userChoice = strtoupper(readline("Input your options: ROCK, PAPER or Scissors: "));
if (!in_array($userChoice, $options)) {
    echo 'Invalid option';
    exit;
}
$cpuChoice = $options[rand(0, 2)];
if ($userChoice === $cpuChoice) {
    echo 'It`s a draw! You both chose ' . $userChoice;
} else if ($userChoice === 'ROCK' && $cpuChoice === 'SCISSORS' || $userChoice === 'PAPER' && $cpuChoice === 'ROCK' || $userChoice === 'SCISSORS' && $cpuChoice === 'PAPER') {
    echo 'User wins! ' . $userChoice . ' beats ' . $cpuChoice;
} else {
    echo 'Cpu wins! ' . $cpuChoice . ' beats ' . $userChoice;
}