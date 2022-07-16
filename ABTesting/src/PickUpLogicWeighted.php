<?php

declare(strict_types=1);

namespace ExadsPlus;

use ExadsPlus\IntGenerator\IntGenerator;

final class PickUpLogicWeighted
{
    private IntGenerator $randomIntGenerator;


    public function __construct(IntGenerator $randomGenerator)
    {
        $this->randomIntGenerator = $randomGenerator;
    }


    /**
     * @param array<int, int> $options
     *
     * @return int
     */
    public function __invoke(array $options): int
    {
        if (array_sum($options) !== 100) {
            throw new \DomainException('Sum of percentages is not equal to 100');
        }

        $randomInteger = $this->randomIntGenerator->generate();
        if ($randomInteger < 1 || $randomInteger > 100) {
            throw new \OutOfRangeException('Random integer is invalid');
        }

        $sum = 0;
        foreach ($options as $key => $weight) {
            $sum += $weight;
            if ($sum >= $randomInteger) {
                return $key;
            }
        }

        throw new \DomainException('Invalid options');
    }
}