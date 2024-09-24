<?php

declare(strict_types=1);

namespace Kaante\QuickCache;

class QuickCache
{
    private array $cache = [];
    private array $expire = [];

    public function set(string $key, mixed $value, int $expire = 0): void
    {
        $this->cache[$key] = $value;
        $this->expire[$key] = $expire;
    }

    public function get(string $key): mixed
    {
        if (isset($this->cache[$key])) {
            if ($this->expire[$key] > time()) {
                return $this->cache[$key];
            }
            unset($this->cache[$key]);
            unset($this->expire[$key]);
        }
        return null;
    }

    public function delete(string $key): void
    {
        unset($this->cache[$key]);
        unset($this->expire[$key]);
    }

    public function clear(): void
    {
        $this->cache = [];
        $this->expire = [];
    }
}
