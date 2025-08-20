<?php
namespace App\Http\Controllers\Api\Room;

use App\Http\Requests\Room\FormCreateRequest;
use App\Http\Requests\Room\FormUpdateRequest;
use App\Http\Requests\Room\IndexRequest;
use App\Http\Requests\Room\ShowDeleteRequest;
use App\Http\Requests\Room\StoreRequest;
use App\Http\Requests\Room\UpdateRequest;
use App\Http\Resources\Room\IndexShowResource;
use App\Http\Resources\Room\StoreUpdateResource;
use App\Services\Room\RoomFormService;
use App\Services\Room\RoomService;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\{JsonResponse, Response};
use Throwable;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

class RoomController extends ApiController
{
    /**
     * @param RoomService $roomService
     * @param RoomFormService $roomFormService
     */
    public function __construct(
        protected readonly RoomService $roomService,
        protected readonly RoomFormService $roomFormService,
    ) {
        //
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return $this->success(
            IndexShowResource::collection(
                $this->roomService->all(
                    $request->toData(),
                ),
            ),
        );
    }

    /**
     * @param ShowDeleteRequest $request
     * @return JsonResponse
     */
    public function show(ShowDeleteRequest $request): JsonResponse
    {
        return $this->success(
            IndexShowResource::make(
                $this->roomService->findById(
                    $request->toData()
                ),
            ),
        );
    }


    /**
     * Delete an Room by ID.
     *
     * @param ShowDeleteRequest $request
     * @return Response
     * @throws Throwable
     */
    public function destroy(ShowDeleteRequest $request): Response
    {
        $this->roomService->delete($request->toData());
        return $this->noContent();
    }


    /**
     * @param FormCreateRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function getFormStore(FormCreateRequest $request): JsonResponse
    {
        return $this->success(
            $this->roomFormService->getFormStore(
                formCreateData: $request->toData(),
            ),
        );
    }


    /**
     * @param FormUpdateRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function getFormUpdate(FormUpdateRequest $request): JsonResponse
    {
        return $this->success(
            $this->roomFormService->getFormUpdate(
                formUpdateData: $request->toData(),
            ),
        );
    }


    public function store(StoreRequest $request): JsonResponse
    {
        $roomData = $this->roomService->createAndReturn(
            $request->toData()
        );

        return $this->success(
            StoreUpdateResource::make($roomData),
            ResponseStatus::HTTP_CREATED
        );
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        $roomData = $this->roomService->updateAndReturn(
            $request->toData()
        );

        return $this->success(
            StoreUpdateResource::make($roomData)
        );
    }

}
