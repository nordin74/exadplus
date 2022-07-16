<?php

namespace ExadsPlus;

use ExadsPlus\IntGenerator\IntGenerator;
use PHPUnit\Framework\TestCase;

final class PickUpLogicWeightedTest extends TestCase
{
    /**
     * @testdox Successful Scenario
     */
    public function test__invokeSuccessful()
    {
        $options = [1 => 50, 2 => 25, 3 => 25];

        $intFixed = new class implements IntGenerator {
            public function generate(): int
            {
                return 75;
            }
        };

        $pickUpLogicWeighted = new PickUpLogicWeighted($intFixed);
        $this->assertEquals(2, $pickUpLogicWeighted($options));



        $intFixed = new class implements IntGenerator {
            public function generate(): int
            {
                return 99;
            }
        };

        $pickUpLogicWeighted = new PickUpLogicWeighted($intFixed);
        $this->assertEquals(3, $pickUpLogicWeighted($options));
    }


    /**
     * @testdox Wrong Scenario: Invalid sum of percentages
     */
    public function test__invokeFailInvalidSumOfPercentages()
    {
        $intFixed = new class implements IntGenerator {
            public function generate(): int
            {
                return 50;
            }
        };
        $options = [1 => -1, 2 => -25, 3 => 'AAA'];
        $pickUpLogicWeighted = new PickUpLogicWeighted($intFixed);
        $this->expectExceptionMessage('Sum of percentages is not equal to 100');
        $pickUpLogicWeighted($options);
    }


    /**
     * @testdox Wrong Scenario: Invalid random Integer
     */
    public function test__invokeFailInvalidRandomInteger()
    {
        $options = [1 => 50, 2 => 25, 3 => 25];

        $intFixed = new class implements IntGenerator {
            public function generate(): int
            {
                return 0;
            }
        };
        $pickUpLogicWeighted = new PickUpLogicWeighted($intFixed);
        $this->expectExceptionMessage('Random integer is invalid');
        $pickUpLogicWeighted($options);
    }
}
