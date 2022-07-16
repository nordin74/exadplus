<?php

declare(strict_types=1);

namespace ExadsPlus;

use Exads\ABTestData;
use ExadsPlus\IntGenerator\IntGenerator;
use PHPUnit\Framework\TestCase;

final class DesignSelectorTest extends TestCase
{
    public function testGetDesignInfo()
    {
        $pickUpLogicFixed = new PickUpLogicWeighted(
            new class implements IntGenerator {
                public function generate(): int
                {
                    return 1;
                }
            }
        );

        $designSelector = new DesignSelector(new ABTestData(1), $pickUpLogicFixed);
        $designInfo = $designSelector->getDesignInfo();
        $this->assertInstanceOf(DesignInfo::class, $designInfo);

        $this->assertEquals(1, $designInfo->getDesignId());
        $this->assertEquals('Test A', $designInfo->getDesignName());
        $this->assertEquals('main', $designInfo->getGetPromotionName());
    }
}
