<?php
/*
    https://leetcode.com/problems/array-nesting/
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function arrayNesting($nums) {
        $maxLenghtS = 0;
        $countNums = count($nums);
        for ($i = 0; $i < $countNums; $i++){
            if ( !isset($nums[$i]) ){
                continue;
            }
            $lastNum = $nums[$i];
            unset($nums[$i]);
            $s = [];
            $s[0] = $lastNum;
            $sInd = 1;
            while (true){
                if ( !isset($nums[ $lastNum ]) ){
                    break;
                }
                $currentNum = $nums[ $lastNum ];
                unset( $nums[$lastNum] );
                $s[$sInd] = $currentNum;
                $lastNum = $currentNum;
                $sInd++;
            }
            $maxLenghtS = max( $maxLenghtS, count($s) );
        }
        return $maxLenghtS;
    }
}