<?php
//jāuztaisa uzvaras opcijas un pārbaudīt ar tām, lai IF ir daudz īsāks.
//$winoptions = [['ROCK', 'SCISSORS'], ['SCISSORS', 'PAPER'], ['PAPER', 'ROCK']];
$options = ['ROCK', 'PAPER', 'SCISSORS'];
$userChoise = strtoupper(readline("Input your options: ROCK, PAPER or Scissors: "));
if (!in_array($userChoise, $options)) {
    echo 'Invalid option';
    exit;
}
$cpuChoise = $options[rand(0, 2)];
if ($userChoise === $cpuChoise) {
    echo 'It`s a draw! You both chose ' . $userChoise;
} else if ($userChoise === 'ROCK' && $cpuChoise === 'SCISSORS' || $userChoise === 'PAPER' && $cpuChoise === 'ROCK' || $userChoise === 'SCISSORS' && $cpuChoise === 'PAPER') {
    echo 'User wins! ' . $userChoise . ' beats ' . $cpuChoise;
} else {
    echo 'Cpu wins! ' . $cpuChoise . ' beats ' . $userChoise;
}