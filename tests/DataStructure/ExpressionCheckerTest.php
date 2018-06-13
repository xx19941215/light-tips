<?php
namespace Test\DataStructure;

use DataStructure\Stack\ExpressionChecker;
use PHPUnit\Framework\TestCase;

class ExpressionCheckerTest extends TestCase
{
    private $checker;

    public function setUp()
    {
        $this->checker = new ExpressionChecker();
    }

    public function testCheck()
    {
        $expressions[] = [ 'expression' => "8 * (9 -2) + { (4 * 5) / ( 2 * 2) }", 'res' => true ];
        $expressions[] = [ 'expression' => "5 * 8 * 9 / ( 3 * 2 ) )", 'res' => false];
        $expressions[] = [ 'expression' => "[{ (2 * 7) + ( 15 - 3) ]", 'res' => false];

        foreach ($expressions as $item) {
            $this->assertEquals($item['res'], $this->checker->check($item['expression']));
        }
    }
}