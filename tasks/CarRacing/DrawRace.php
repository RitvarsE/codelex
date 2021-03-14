<?php


class DrawRace
{
    private string $line;
    private const SYMBOL = '-';

    public function __construct(Track $track)
    {
        $this->line = str_repeat(self::SYMBOL, $track->getLength() - 1) . '|';
    }

    public function drawTrack(DriverCollection $drivers): string
    {
        $drawTrack = '';
        foreach ($drivers->getDrivers() as $driver) {
            $drawTrack .= substr_replace($this->line,
                    $driver->getCrashed() ? '¤' : $driver->getDriver()->getName(),
                    $driver->getPosition(),
                    1) . PHP_EOL;
        }
        return $drawTrack;
    }

    public function array_push_assoc($array, $key, $value): array
    {
        $array[$key] = $value;
        return $array;
    }

    public function drawLeaderBoard(DriverCollection $drivers): string
    {
        $leaderBoard = [];
        foreach ($drivers->getDrivers() as $driver) {
            $leaderBoard = $this->array_push_assoc($leaderBoard,
                $driver->getDriver()->getName(),
                $driver->getCrashed() ? 'Crashed' : $driver->getTime());
        }

        uasort($leaderBoard, static function ($a, $b) {
            return is_int($b) - is_int($a) ?: strnatcmp($a, $b);
        });
        $position = 1;
        $drawLeaderboard = '';
        foreach ($leaderBoard as $car => $time) {
            $drawLeaderboard .= $time === 'Crashed' ? 'N. ' . $car . ' Crashed' : $position++ . '. ' . $car . ' Time: ' . $time;
            $drawLeaderboard .= PHP_EOL;
        }

        return $drawLeaderboard;
    }
}
