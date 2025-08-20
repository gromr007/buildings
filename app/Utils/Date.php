<?php
declare(strict_types=1);


namespace App\Utils;

use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

class Date
{
    /**
     * @return CarbonImmutable
     */
    public static function now(): CarbonImmutable
    {
        return CarbonImmutable::now()->setTimezone(timeZone: 'UTC');
    }

    /**
     * Преобразует дату в формат PostgreSQL YYYY-MM-DD
     *
     * @param string $input Дата в формате dd-mm-yyyy, dd-mm-yy или dd месяц yyyy
     * @return string|null Дата в формате YYYY-MM-DD или null при ошибке
     */
    public static function convertToPostgresDate($input)
    {
        if (empty($input)) {
            return null;
        }

        $input = trim($input);

        try {
            Carbon::setLocale('ru');
            $date = Carbon::parse($input);
            return $date->format('Y-m-d');
        } catch (\Exception $e) {
            \Log::warning("Не удалось распарсить дату: {$input}", ['exception' => $e]);
            return null;
        }
    }

}
