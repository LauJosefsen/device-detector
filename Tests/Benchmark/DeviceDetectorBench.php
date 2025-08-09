<?php

declare(strict_types=1);

namespace DeviceDetector\Tests\Benchmark;

use DeviceDetector\Cache\StaticCache;
use DeviceDetector\Parser\Bot;
use DeviceDetector\Parser\Client\Browser;
use DeviceDetector\Parser\Client\FastFeedReader;
use DeviceDetector\Parser\Client\FeedReader;
use DeviceDetector\Parser\Client\Hints\AppHints;
use DeviceDetector\Parser\Client\Hints\BrowserHints;
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
use DeviceDetector\Parser\FastBot;
use DeviceDetector\Parser\OperatingSystem;
use DeviceDetector\Parser\VendorFragment;
use DeviceDetector\Tests\Benchmark\Cache\NoopCache;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Revs;
use PhpBench\Attributes\Warmup;

/**
 * ./vendor/bin/phpbench run Tests/Benchmark --report=default
 *
 * Tested with opcache.cli_enabled=on
 */
class DeviceDetectorBench
{
    #[Warmup(10), Iterations(1), Revs(100), ParamProviders('provideParsers')]
    public function benchParsers(array $parserClass): void
    {
        $parserClass = $parserClass[0];
        $userAgent   = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
        $parser      = new $parserClass($userAgent);
        $parser->setCache(new NoopCache());
        $parser->parse();
    }

    #[Warmup(10), Iterations(1), Revs(100), ParamProviders('provideParsers')]
    public function benchParsersWithCache(array $parserClass): void
    {
        $parserClass = $parserClass[0];
        $userAgent   = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
        $parser      = new $parserClass($userAgent);
        $parser->setCache(new StaticCache());
        $parser->parse();
    }

    public function provideParsers()
    {
        yield Browser\Engine::class => [Browser\Engine::class];
        yield AppHints::class => [AppHints::class];
        yield BrowserHints::class => [BrowserHints::class];
        yield FeedReader::class => [FeedReader::class];
        yield MobileApp::class => [MobileApp::class];
        yield MediaPlayer::class => [MediaPlayer::class];
        yield PIM::class => [PIM::class];
        yield Browser::class => [Browser::class];
        yield Library::class => [Library::class];
        yield HbbTv::class => [HbbTv::class];
        yield ShellTv::class => [ShellTv::class];
        yield Notebook::class => [Notebook::class];
        yield Console::class => [Console::class];
        yield CarBrowser::class => [CarBrowser::class];
        yield Camera::class => [Camera::class];
        yield PortableMediaPlayer::class => [PortableMediaPlayer::class];
        yield Mobile::class => [Mobile::class];
        yield Bot::class => [Bot::class];
        yield OperatingSystem::class => [OperatingSystem::class];
        yield VendorFragment::class => [VendorFragment::class];
    }
}
