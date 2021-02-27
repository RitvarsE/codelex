<?php

class Point
{
    public int $firstPoint;
    public int $secondPoint;

    public function __construct(int $firstPoint, int $secondPoint)
    {
        $this->firstPoint = $firstPoint;
        $this->secondPoint = $secondPoint;
    }

    static function swapPoints(object $first, object $second): void
    {
        $firstPointArray = [];
        $secondPointArray = [];

        array_push($firstPointArray, $first->firstPoint, $first->secondPoint);
        array_push($secondPointArray, $second->firstPoint, $second->secondPoint);

        $replacedFirstPoint = array_replace($firstPointArray, $secondPointArray);
        $replacedSecondPoint = array_replace($secondPointArray, $firstPointArray);

        $first->firstPoint = $replacedFirstPoint[0];
        $first->secondPoint = $replacedFirstPoint[1];
        $second->firstPoint = $replacedSecondPoint[0];
        $second->secondPoint = $replacedSecondPoint[1];
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
Point::swapPoints($p1, $p2);
echo "($p1->firstPoint, $p1->secondPoint)\n($p2->firstPoint, $p2->secondPoint)";