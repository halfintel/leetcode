<?php
/*
    https://leetcode.com/problems/two-sum/
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $search = true;
        while ($search){
            if ( count($nums) < 2 ){
                return 'result not isset';
            }
            $firstInd = null;
            $firstNum = null;
            $needFirstNum = true;
            foreach ($nums as $i => $num){
                if ( $needFirstNum ){
                    $firstInd = $i;
                    $firstNum = $num;
                    $needFirstNum = false;
                    continue;
                }
                $summ = $firstNum + $num;
                if ( $summ == $target ){
                    return [$firstInd, $i];
                }
            }
            unset( $nums[$firstInd] );// для этого числа нет пары, удаляем
        }
    }
}