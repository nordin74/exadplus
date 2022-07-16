<?php

declare(strict_types=1);

namespace ExadsPlus\IntGenerator;

class IntGeneratorRandomPercentage implements IntGenerator
{
    public function generate(): int
    {
        return \mt_rand(1, 100);
    }
}