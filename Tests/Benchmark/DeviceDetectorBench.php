<?php

declare(strict_types=1);

namespace DeviceDetector\Tests\Benchmark;

use DeviceDetector\Cache\StaticCache;
use DeviceDetector\Parser\Client\FastFeedReader;
use DeviceDetector\Tests\Benchmark\Cache\NoopCache;
use DeviceDetector\Parser\Client\AbstractClientParser;
use DeviceDetector\Parser\Client\FeedReader;
use DeviceDetector\Tests\Benchmark\Cache\ApcuCache;
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

    #[Warmup(100), Iterations(1), Revs(1000), ParamProviders('provideParsers')]
    public function benchParsers(array $parserClass): void
    {
        $parserClass = $parserClass[0];
        $userAgent   = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
        $parser      = new $parserClass($userAgent);
        $parser->setCache(new NoopCache());
        $parser->parse();
    }

    #[Warmup(100), Iterations(1), Revs(1000), ParamProviders('provideParsers')]
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
        yield FeedReader::class => [FeedReader::class];
        yield FastFeedReader::class => [FastFeedReader::class]; // Only one made ready as PoC.
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
    }
}
