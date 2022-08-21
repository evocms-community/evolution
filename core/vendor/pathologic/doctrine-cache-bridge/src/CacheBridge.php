<?php


namespace Pathologic\EvolutionCMS\DoctrineCache;
use Doctrine\Common\Cache\Cache as DoctrineCache;
use Illuminate\Cache\CacheManager;

class CacheBridge extends CacheManager implements DoctrineCache
{
    public function fetch($id)
    {
        return $this->store()->get($id, false);
    }

    public function contains($id)
    {
        return $this->store()->has($id);
    }

    public function save($id, $data, $lifeTime = 0)
    {
        $lifeTime = max(0, $lifeTime);

        return $lifeTime > 0 ? $this->store()->put($id, $data, $lifeTime) : $this->store()->forever($id, $data);
    }

    public function delete($id)
    {
        return $this->store()->forget($id);
    }

    public function getStats()
    {
        return;
    }
}