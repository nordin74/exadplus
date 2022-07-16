<?php

use Cocur\Slugify\Slugify;
use Exads\ABTestData;
use ExadsPlus\DesignSelector;
use ExadsPlus\IntGenerator\IntGeneratorRandomPercentage;
use ExadsPlus\PickUpLogicWeighted;
use ExadsPlus\View;

require_once __DIR__ .'/../vendor/autoload.php';

const VIEW_PATH = __DIR__ . '/../src/views';

try {
    $promotionId = random_int(1, 3);
    $designSelector = new DesignSelector(
        new ABTestData($promotionId),
        new PickUpLogicWeighted(new IntGeneratorRandomPercentage())
    );
    $designInfo = $designSelector->getDesignInfo();
} catch (\Exception $exception) {
    $view = new View(VIEW_PATH . '/error');
    echo $view->render();

    return;
}

$slugify = new Slugify();
$view = new View(VIEW_PATH . '/layout');
$view->designId = $designInfo->getDesignId();
$view->designName = $designInfo->getDesignName();
$view->promotionName = $designInfo->getGetPromotionName();
$view->subViewTpl = "/$promotionId-{$slugify->slugify($view->promotionName)}/{$slugify->slugify($view->designName)}";

echo $view->render();