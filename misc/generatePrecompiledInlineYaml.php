<?php

declare(strict_types=1);

use DeviceDetector\Parser\AbstractParser;
use DeviceDetector\Parser\Bot;
use DeviceDetector\Parser\Client\Browser;
use DeviceDetector\Parser\Client\FeedReader;
use DeviceDetector\Parser\Client\Library;
use DeviceDetector\Parser\Client\MediaPlayer;
use DeviceDetector\Parser\Client\MobileApp;
use DeviceDetector\Parser\Client\PIM;
use DeviceDetector\Parser\Device\Camera;
use DeviceDetector\Parser\Device\CarBrowser;
use DeviceDetector\Parser\Device\Console;
use DeviceDetector\Parser\Device\HbbTv;
use DeviceDetector\Parser\Device\Mobile;
use DeviceDetector\Parser\Device\Notebook;
use DeviceDetector\Parser\Device\PortableMediaPlayer;
use DeviceDetector\Parser\Device\ShellTv;
use DeviceDetector\Parser\OperatingSystem;
use DeviceDetector\Parser\VendorFragment;

require __DIR__ . '/../vendor/autoload.php';

/** @var array<class-string<AbstractParser>> $parsers */
$parsers = [
    Browser\Engine::class,
    \DeviceDetector\Parser\Client\Hints\AppHints::class,
    \DeviceDetector\Parser\Client\Hints\BrowserHints::class,

    Browser::class,
    FeedReader::class,
    Library::class,
    MediaPlayer::class,
    MobileApp::class,
    PIM::class,

    Camera::class,
    CarBrowser::class,
    Console::class,
    HbbTv::class,
    Mobile::class,
    Notebook::class,
    PortableMediaPlayer::class,
    ShellTv::class,

    Bot::class,
    OperatingSystem::class,
    VendorFragment::class,
];

// Generate a compiled.php file with constants for each parser such as
// DEVICEDETECTOR_CLIENT_BROWSER_REGEXES
// DEVICEDETECTOR_CLIENT_BROWSER_OVERALL_MATCH

$compiledFile = __DIR__ . '/../Parser/PrecompiledYaml.php';

$compiledContent = <<<PHP
<?php

/**
 * THIS FILE IS AUTO-GENERATED, DO NOT EDIT
 * 
 * Can be re-created by running: php misc/generatePrecompiledInlineYaml.php
 */

declare(strict_types=1);

namespace DeviceDetector\Parser;

class PrecompiledYaml
{

PHP;

foreach ($parsers as $parserClass) {
    echo "Processing parser: {$parserClass}\n";
    $parser = new $parserClass('');
    // Overall match is calculated
    $regexes = $parser->computeRegexes();



    // Define as class constants

    $compiledContent .= sprintf(
        "    // %s\n",
        $parserClass
    );

    $compiledContent .= sprintf(
        "    const PRECOMPILED_%s_REGEXES = %s;\n",
        strtoupper(str_replace('\\', '_', $parserClass)),
        str_replace("\n", '', var_export($regexes, true))
    );
    if (!in_array($parserClass, [VendorFragment::class, \DeviceDetector\Parser\Client\Hints\AppHints::class, \DeviceDetector\Parser\Client\Hints\BrowserHints::class])) {
        $overallMatch = $parser->getOverallMatch();
        $compiledContent .= sprintf(
            "    const PRECOMPILED_%s_OVERALL_MATCH = %s;\n",
            strtoupper(str_replace('\\', '_', $parserClass)),
            str_replace("\n", '', var_export($overallMatch, true))
        );
    }

}

$compiledContent .= <<<PHP

}
PHP;

file_put_contents($compiledFile, $compiledContent);
