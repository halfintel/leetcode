<?php
/*
    https://leetcode.com/problems/max-points-on-a-line/
*/
class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function maxPoints($points) {
        if (count($points) < 3){
            return count($points);
        }
        $maxPointsOnLineCount = 0;
        for ($z1 = 0; $z1 < count($points); $z1++){
            $point1 = $points[$z1];
            $x1 = $point1[0];
            $y1 = $point1[1];

            for ($z2 = $z1 + 1; $z2 < count($points); $z2++){
                $point2 = $points[$z2];
                $x2 = $point2[0];
                $y2 = $point2[1];

                // разница между 0 и 1 ячейками
                $diffs = $this->getBaseDiffs([$x2 - $x1, $y2 - $y1]);
                $diffX1 = $diffs[0];
                $diffY1 = $diffs[1];
                // получили линию [1,1] - [5,3], на которой смотрим остальные точки


                $maxPointsOnCurrentLineCount = 2;// количество точек на текущей прямой
                // проверяем, лежат ли другие точки на этой линии
                for ($z3 = $z2 + 1; $z3 < count($points); $z3++){
                    $point3 = $points[$z3];
                    $x3 = $point3[0];
                    $y3 = $point3[1];
                    // разница между 1 и 2 ячейками
                    $diffs = $this->getBaseDiffs([$x3 - $x1, $y3 - $y1]);
                    $diffX2 = $diffs[0];
                    $diffY2 = $diffs[1];


                    if ($diffX1 == $diffX2 && $diffY1 == $diffY2){
						$maxPointsOnCurrentLineCount++;
					} else if ($diffX1 == -1 * $diffX2 && $diffY1 == -1 * $diffY2){
						$maxPointsOnCurrentLineCount++;
					}
                }
                if ( $maxPointsOnCurrentLineCount > $maxPointsOnLineCount ){
                    $maxPointsOnLineCount = $maxPointsOnCurrentLineCount;
                }
            }
        }
        return $maxPointsOnLineCount;
    }
    function getBaseDiffs($diffs) {//приводит diffX1 и diffY1 к взаимно простым числам
        $gcd = $this->getGcd($diffs);
        $diffs[0] = $diffs[0] / $gcd;
        $diffs[1] = $diffs[1] / $gcd;
        return $diffs;
    }
    function getGcd($diffs) {//наибольший общий делитель
        $a = abs($diffs[0]);
        $b = abs($diffs[1]);
        if ( $b > $a ){
            $c = $a;
            $a = $b;
            $b = $c;
        }
        $gcd = 1;
        for ( $i = 1; $i <= $a; $i++ ){
            if ( $a % $i == 0 && $b % $i == 0 && $i != 1 ){
                $gcd = $gcd * $i;
                $a = $a / $i;
                $b = $b / $i;
                $i = $i - 1;
            }
        }
        return $gcd;
    }
}