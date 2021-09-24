<?php
/*
    https://leetcode.com/problems/minimum-remove-to-make-valid-parentheses/
*/
class Solution {
    private $arrOfUnpairedParenthesesLeft = [];
    private $arrOfUnpairedParenthesesRight = [];
    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid($s) {
        $this->searchUnpairedParentheses($s);
        $s = $this->removeUnpairedParentheses($s);
        return $s;
    }

    // ищем скобки без пары
    function searchUnpairedParentheses($s) {
        // собираем все левые и правые скобки
        for ($i = 0; $i < strlen($s); $i++){
            $letter = $s[$i];
            if ($letter == '('){
                $this->arrOfUnpairedParenthesesLeft[$i] = $i;
            } else if ($letter == ')'){
                $this->arrOfUnpairedParenthesesRight[$i] = $i;
            }
        }
        
        // ищем пары и удаляем их
        foreach ($this->arrOfUnpairedParenthesesLeft as $parenthesesLeft){
            $parenthesesRight = $this->getParenthesesRight($parenthesesLeft);
            if ($parenthesesRight != null){
                unset( $this->arrOfUnpairedParenthesesLeft[$parenthesesLeft] );
                unset( $this->arrOfUnpairedParenthesesRight[$parenthesesRight] );
            }
        }
    }
    // удаляем скобки без пары из строки
    function removeUnpairedParentheses($s) {
        $sArr = str_split($s);
        foreach ($this->arrOfUnpairedParenthesesLeft as $parenthesesLeft){
            unset($sArr[$parenthesesLeft]);
        }
        foreach ($this->arrOfUnpairedParenthesesRight as $parenthesesRight){
            unset($sArr[$parenthesesRight]);
        }
        $s = implode('', $sArr);
        return $s;
    }
    function getParenthesesRight($parenthesesLeft) {
        foreach ($this->arrOfUnpairedParenthesesRight as $parenthesesRight){
            if ($parenthesesLeft < $parenthesesRight){
                return $parenthesesRight;
            }
        }
        return null;
    }
}