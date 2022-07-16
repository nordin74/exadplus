<?php

declare(strict_types=1);

namespace ExadsPlus;

class DesignInfo
{
    private int     $designId;
    private string  $designName;
    private ?string $getPromotionName;


    public function __construct(int $designId, string $designName, ?string $getPromotionName)
    {
        $this->designId = $designId;
        $this->designName = $designName;
        $this->getPromotionName = $getPromotionName;
    }


    public function getDesignId(): int
    {
        return $this->designId;
    }


    public function getGetPromotionName(): ?string
    {
        return $this->getPromotionName;
    }


    public function getDesignName(): string
    {
        return $this->designName;
    }
}