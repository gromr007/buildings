<?php

declare(strict_types=1);

namespace App\Models\Room;

use App\Models\AbstractModel;
use App\Models\Dict\DictFurniture;
use App\Models\Dict\DictMaterialFloor;
use App\Models\House\House;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasOne};
use Illuminate\Support\Collection;
use Spatie\LaravelData\WithData;

/**
 * @property int $id
 * @property string $name
 * @property int $numb_electr_points
 * @property boolean $suspended_ceiling
 *
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 *
 * @property DictMaterialFloor $dictMaterialFloor //material_floor_id
 * @property Collection<int, DictFurniture> $dictFurnitures
 *
 * @property int $house_id
 *
 */
class Room extends AbstractModel
{
    use WithData;

    /** @var string */
    protected $table = 'rooms';

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
     * @return HasOne
     */
    public function dictMaterialFloor(): HasOne
    {
        return $this->hasOne(
            related: DictMaterialFloor::class,
            foreignKey: 'id',
            localKey: 'material_floor_id'
        );
    }


    /**
     * @return BelongsTo
     */
    public function house(): BelongsTo
    {
        return $this->belongsTo(
            related: House::class,
            foreignKey: 'house_id',
            ownerKey: 'id',
        );
    }

    /**
     * @return BelongsToMany
     */
    public function dictFurnitures(): BelongsToMany
    {
        return $this->belongsToMany(
            related: DictFurniture::class,        // Модель, с которой устанавливается связь
            table: 'link_dict_furniture_room',       // Имя промежуточной таблицы
            foreignPivotKey: 'room_id',       // Внешний ключ модели в промежуточной таблице
            relatedPivotKey: 'dict_furniture_id',   // Внешний ключ модели в промежуточной таблице
            parentKey: 'id',             // Локальный ключ модели текущей модели
            relatedKey: 'id'             // Локальный ключ модели текущей модели
        );
    }

}
