<?php

declare(strict_types=1);

namespace ExadsPlus;

use Exads\ABTestData;

class DesignSelector
{
    private ABTestData          $promotion;
    private PickUpLogicWeighted $pickUpLogicWeighted;


    public function __construct(ABTestData $promotion, PickUpLogicWeighted $pickUpLogicWeighted)
    {
        $this->promotion = $promotion;
        $this->pickUpLogicWeighted = $pickUpLogicWeighted;
    }


    public function getDesignInfo(): DesignInfo
    {
        $designs = $this->promotion->getAllDesigns();
        $designsWeights = [];
        foreach ($designs as $key => $design) {
            $designsWeights[$key] = $design['splitPercent'];
        }
        $designSelected = ($this->pickUpLogicWeighted)($designsWeights);

        return new DesignInfo(
            $designs[$designSelected]['designId'],
            $designs[$designSelected]['designName'],
            $this->promotion->getPromotionName(),
        );
    }
}
