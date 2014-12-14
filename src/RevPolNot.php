<?php
namespace RevPolNotation;
include dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
/**
 *
 * Evaluate the value of an arithmetic expression in Reverse Polish Notation.
 * 
 */

class RevPolNot {

    private $validOperators;

    /**
     * __construct
     *@param array validOperators
     *
     */
    public function __construct(...$validOperators)
    {
        $this->validOperators = $validOperators;
    }

    /**
     * calculator
     *
     * @param array $data
     *
     * @return int 
     */
    public function calculator(array $data)
    {
        $stack = array();

        foreach ($data as $value) {
                       
            if (is_integer($value)) {
                $stack[] = $value;
            } else {
                
                if (!in_array($value, $this->validOperators)) {
                    return "Operator {$value} is not a valid operator";
                }

                $second = array_pop($stack);
                $first  = array_pop($stack);

                $result  = $this->calculate($first, $value, $second);
                $stack[] = $result;
            }
        }

        return $result;
    }

    /**
     * calculate converts string to the operator
     * 
     * @param int $fir
     * @param string $ope
     * @param int $sec
     *
     * @return int
     *
     */
    private function calculate($fir, $ope, $sec)
    {
        $result = 0;

        switch ($ope) {
            case '+':
                $result = $fir + $sec;
                break;
            case '-':
                $result = $fir - $sec;
                break;
            case '*':
                $result = $fir * $sec;
                break;
            case '/':
                $result = $fir / $sec;
                break;
        }

        return (int)$result;
    }
}
