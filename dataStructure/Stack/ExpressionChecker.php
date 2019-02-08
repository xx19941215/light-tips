<?php
namespace DataStructure\Stack;

class ExpressionChecker
{
    //$expressions[] = "8 * (9 -2) + { (4 * 5) / ( 2 * 2) }";
    //$expressions[] = "5 * 8 * 9 / ( 3 * 2 ) )";
    //$expressions[] = "[{ (2 * 7) + ( 15 - 3) ]";

    public function check(string $expression): bool
    {
        $stack = new \SplStack();

        foreach (str_split($expression) as $item) {
            switch ($item) {
                case '{':
                case '[':
                case '(':
                    $stack->push($item);
                    break;

                case '}':
                case ']':
                case ')':
                    if ($stack->isEmpty()) return false;

                    $last = $stack->pop();

                    if (
                        $item == '}' && $last != '{' ||
                        $item == ')' && $last != '(' ||
                        $item == ']' && $last != '['
                    )
                        return false;

                    break;
            }
        }

        if ($stack->isEmpty()) {
            return true;
        }

        return false;
    }
}