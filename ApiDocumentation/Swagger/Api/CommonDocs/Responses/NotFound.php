<?php
declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\CommonDocs\Responses;

use OpenApi\Annotations as OA;

/**
 * @OA\Response(
 *          response="404",
 *          description="Ресурс не найден",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="success", type="boolean", example=false),
 *              @OA\Property(property="message", type="string", example="Resource not found"),
 *              @OA\Property(property="code", type="integer", example=404)
 *          )
 *      )
 */
final readonly class NotFound
{
    //
}
