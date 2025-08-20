<?php

declare(strict_types=1);

namespace App\Http\Requests\CustomRules;

use App\Repositories\Room\RoomRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class RoomInHouseExists implements ValidationRule
{

    /**
     * @param RoomRepository $repository
     */
    public function __construct(
        private readonly RoomRepository $repository
    )
    {
        //
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $request = request();
        if ($this->repository->bandByHouse((int)$request->house_id, (int)$request->room_id)) {} else {
            $fail('ID комнаты не соответствует ID дома.');
        }
    }
}
