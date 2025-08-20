<?php

namespace App\Enums\Dict;

use App\Utils\ConvertCase;
enum DictEnum
{
    /**
     * @param string $dict
     * @return string
     */
    public static function modelName(string $dict): string
    {
        return 'App\\Models\\Dict\\Dict' . ConvertCase::snakeToCamel($dict);
    }

    /**
     * @param string $dict
     * @return string
     */
    public static function dataName(string $dict): string
    {
        return 'App\\Data\\Dict\\Dict' . ConvertCase::snakeToCamel($dict) . 'Data';
    }

    /**
     * @param string $dict
     * @return string
     */
    public static function storeDataName(string $dict): string
    {
        return 'App\\Data\\Dict\\Dict' . ConvertCase::snakeToCamel($dict) . 'StoreData';
    }

    /**
     * @param string $dict
     * @return string
     */
    public static function repositoryName(string $dict): string
    {
        return 'App\\Repositories\\Dict\\Dict' . ConvertCase::snakeToCamel($dict) . 'Repository';
    }

    /**
     * @param string $model
     * @return string
     */
    public static function nameByModel(string $model): string
    {
        return ConvertCase::camelToSnake(preg_replace('/App\\\Models\\\Dict\\\Dict/', '', $model));
    }

    /**
     * @param string $data
     * @return string
     */
    public static function nameByData(string $data): string
    {
        return ConvertCase::camelToSnake(preg_replace('/App\\\Data\\\Dict\\\Dict/', '', $data));
    }

    /**
     * @param string $repository
     * @return string
     */
    public static function nameByRepository(string $repository): string
    {
        return ConvertCase::camelToSnake(
            preg_replace('/App\\\Repositories\\\Dict\\\Dict/', '', $repository)
        );
    }
}
