<?php
/*
    https://leetcode.com/problems/largest-number-after-mutating-substring/
*/
class Solution {

    /**
     * @param String $num
     * @param Integer[] $change
     * @return String
     */
    function maximumNumber($num, $change) {
        $numArr = str_split($num);
        $changeStarted = false;
        foreach ($numArr as $i => $number){
            if ( $change[$number] > $number ){
                $changeStarted = true;
                $numArr[$i] = $change[$number];
            } else if ( $change[$number] == $number ){
                
            } else if ($changeStarted){
                break;
            }
        }
        $newNum = implode('', $numArr);
        return $newNum;
    }
}