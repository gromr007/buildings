<?php

declare(strict_types=1);

namespace App\Services\Dict;

use App\Enums\Dict\DictEnum;
use App\Repositories\Dict\DictRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as CollectionSupp;
use Spatie\LaravelData\Data;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Exception;
use Throwable;


final class DictService
{

    /**
     * @param DictRepository $repository
     */
    public function __construct(
        protected DictRepository $repository,
    )
    {

    }

    /**
     * @param $dict
     * @return CollectionSupp
     */
    public function all($dict): CollectionSupp
    {
        $modelName = $this->getModelName($dict);
        $dataName = $this->getDataName($dict);
        $this->setRepository($dict);

        return $this->repository->allData($dataName, $modelName);
    }


    /**
     *
     * */
    public function getModelName(string $dict): string
    {
        $modelName = DictEnum::modelName($dict);
        $modelExists = class_exists($modelName);
        if (!$modelExists) {
            throw new NotFoundHttpException();
        }

        return $modelName;
    }

    /**
     *
     * */
    public function getDataName(string $dict): string
    {
        $dataName = DictEnum::dataName($dict);
        $dataExists = class_exists($dataName);
        if (!$dataExists) {
            throw new NotFoundHttpException();
        }

        return $dataName;
    }


    /**
     * @return bool
     * */
    public function existsById( int $id, string $dict): bool
    {
        $modelName = DictEnum::modelName($dict);
        $this->setRepository($dict);

        return $this->repository->existsById($id, $modelName);

    }


    /**
     *
     * */
    private function setRepository(string $dict): void
    {
        $repositoryName = DictEnum::repositoryName($dict);
        $repositoryExists = class_exists($repositoryName);

        if($repositoryExists) {
            $this->repository = app($repositoryName);
        } else {
            $this->repository = app(DictRepository::class);
        }
    }

}
