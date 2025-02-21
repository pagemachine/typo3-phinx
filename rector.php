<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Ssch\TYPO3Rector\Set\Typo3LevelSetList;
use Ssch\TYPO3Rector\Set\Typo3SetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Classes',
    ])
    ->withRootFiles()
    ->withPhpSets()
    ->withDowngradeSets(
        php81: true,
    )
    ->withSets([
        Typo3SetList::TYPO3_12,
        Typo3LevelSetList::UP_TO_TYPO3_13,
    ])
;
