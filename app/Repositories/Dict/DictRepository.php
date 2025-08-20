<?php

declare(strict_types=1);

namespace App\Repositories\Dict;

use App\Utils\DbTransactionManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Throwable;

class DictRepository
{
    public function __construct(
        private readonly DbTransactionManager $dbTransactionManager
    )
    {
        //
    }

    /**
     * @param string $dataName
     * @param string $modelName
     * @return Collection<int, Model>
     */
    public function allData(string $dataName, string $modelName): Collection
    {
        return $dataName::collect(
            $modelName::get()
        );
    }

    /**
     * @param int $id
     * @param string $modelName
     * @return bool
     */
    public function existsById(int $id, string $modelName): bool
    {
        return $modelName::query()->where('id', $id)->exists();
    }


}

