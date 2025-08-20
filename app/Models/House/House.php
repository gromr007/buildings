<?php

declare(strict_types=1);

namespace App\Models\House;

use App\Models\Dict\DictConnectedService;
use App\Models\Dict\DictMaterialWall;
use App\Models\Room\Room;
use Carbon\CarbonImmutable;
use App\Models\AbstractModel;
use Spatie\LaravelData\WithData;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany, HasOne, BelongsTo};

/**
 * @property int $id
 * @property string $roof_color
 * @property string $address
 * @property int $number_of_floors
 * @property boolean $built_in_garage
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 *
 * @property DictMaterialWall $dictMaterialWall //material_wall_id
 * @property Collection<int, DictConnectedService> $dictConnectedServices
 *
 * @property Collection<int, Room> $rooms
 *
 */
class House extends AbstractModel
{
    use WithData;

    /** @var string */
    protected $table = 'houses';

    /** @var string[] */
    protected $guarded = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = false;

    /** @var string[] */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |-------------------------------------------------------------------------------------------------------------------
    | RELATIONS
    |-------------------------------------------------------------------------------------------------------------------
    */

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(
            related: Room::class,
            foreignKey: 'house_id',
            localKey: 'id',
        );
    }


    /**
     * @return HasOne
     */
    public function dictMaterialWall(): HasOne
    {
        return $this->hasOne(
            related: DictMaterialWall::class,
            foreignKey: 'id',
            localKey: 'material_wall_id'
        );
    }


    /**
     * @return BelongsToMany
     */
    public function dictConnectedServices(): BelongsToMany
    {
        return $this->belongsToMany(
            related: DictConnectedService::class,        // Модель, с которой устанавливается связь
            table: 'link_dict_con_serv_house',       // Имя промежуточной таблицы
            foreignPivotKey: 'house_id',       // Внешний ключ модели в промежуточной таблице
            relatedPivotKey: 'dict_connected_service_id',   // Внешний ключ модели в промежуточной таблице
            parentKey: 'id',             // Локальный ключ модели текущей модели
            relatedKey: 'id'             // Локальный ключ модели текущей модели
        ); //->withPivot('',); - Дополнительные столбцы если надо
    }

}
