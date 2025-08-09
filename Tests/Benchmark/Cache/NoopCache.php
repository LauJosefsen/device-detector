<?php

namespace DeviceDetector\Tests\Benchmark\Cache;

use DeviceDetector\Cache\CacheInterface;

class NoopCache implements CacheInterface
{

    public function fetch(string $id)
    {
        return null;
    }

    public function contains(string $id): bool
    {
        return false;
    }

    public function save(string $id, $data, int $lifeTime = 0): bool
    {
        return true;
    }

    public function delete(string $id): bool
    {
        return true;
    }

    public function flushAll(): bool
    {
    }
}