<?php

/*
$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
swap_points(p1, p2);
echo "(" . p1.x . ", " . p1.y . ")";
echo "(" . p2.x . ", " . p2.y . ")";
The output produced from the above code should be:

(-3, 6)
(5, 2)
 */

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
        $firstArray = [];
        $secondArray = [];

        array_push($firstArray, $first->firstPoint, $first->secondPoint);
        array_push($secondArray, $second->firstPoint, $second->secondPoint);

        $replacedFirst = array_replace($firstArray, $secondArray);
        $replacedSecond = array_replace($secondArray, $firstArray);

        $first->firstPoint = $replacedFirst[0];
        $first->secondPoint = $replacedFirst[1];
        $second->firstPoint = $replacedSecond[0];
        $second->secondPoint = $replacedSecond[1];
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
Point::swapPoints($p1, $p2);
echo "($p1->firstPoint, $p1->secondPoint)\n($p2->firstPoint, $p2->secondPoint)";