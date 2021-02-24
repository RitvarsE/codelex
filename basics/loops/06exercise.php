<?php

class AsciiFigure
{
    //konstante ko var mainīt, lai mainītos zīmējums
    const lines = 5;

    // funkcija kurā notiek zīmēšana
    public function drawFigure(): string
    {
        $line = '';
        for ($x = 0; $x < AsciiFigure::lines; $x++) {
            $line .= str_repeat('////', (AsciiFigure::lines - $x - 1));
            $line .= str_repeat('****', $x * 2);
            $line .= str_repeat('\\\\\\\\', (AsciiFigure::lines - $x - 1)) . PHP_EOL;
        }
        return $line;
    }
}

//izveidoju jaunu objektu
$diagram = new AsciiFigure();
//izsaucu jaunizveidotajā objektā funckiju zīmēšanai.
echo $diagram->drawFigure();