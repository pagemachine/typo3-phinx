<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\DowngradeLevelSetList;
use Ssch\TYPO3Rector\Set\Typo3LevelSetList;
use Ssch\TYPO3Rector\Set\Typo3SetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Classes',
    ])
    ->withRootFiles()
    ->withPhpSets()
    ->withSets([
        Typo3SetList::TYPO3_11,
        Typo3LevelSetList::UP_TO_TYPO3_12,
        DowngradeLevelSetList::DOWN_TO_PHP_81,
    ])
;
