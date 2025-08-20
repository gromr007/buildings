<?php
namespace App\Http\Controllers\Api\House;

use App\Http\Requests\House\FormCreateRequest;
use App\Http\Requests\House\FormUpdateRequest;
use App\Http\Requests\House\IndexRequest;
use App\Http\Requests\House\ShowDeleteRequest;
use App\Http\Requests\House\StoreRequest;
use App\Http\Requests\House\UpdateRequest;
use App\Http\Resources\House\IndexShowResource;
use App\Http\Resources\House\StoreUpdateResource;
use App\Services\House\HouseFormService;
use App\Services\House\HouseService;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\{JsonResponse, Response};
use Throwable;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

class HouseController extends ApiController
{
    /**
     * @param HouseService $houseService
     * @param HouseFormService $houseFormService
     */
    public function __construct(
        protected readonly HouseService $houseService,
        protected readonly HouseFormService $houseFormService,
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
                $this->houseService->all(
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
                $this->houseService->findById(
                    $request->toData()
                ),
            ),
        );
    }


    /**
     * Delete an House by ID.
     *
     * @param ShowDeleteRequest $request
     * @return Response
     * @throws Throwable
     */
    public function destroy(ShowDeleteRequest $request): Response
    {
        $this->houseService->delete($request->toData());
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
            $this->houseFormService->getFormStore(
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
            $this->houseFormService->getFormUpdate(
                formUpdateData: $request->toData(),
            ),
        );
    }


    public function store(StoreRequest $request): JsonResponse
    {
        $houseData = $this->houseService->createAndReturn(
            $request->toData()
        );

        return $this->success(
            StoreUpdateResource::make($houseData),
            ResponseStatus::HTTP_CREATED
        );
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        $houseData = $this->houseService->updateAndReturn(
            $request->toData()
        );

        return $this->success(
            StoreUpdateResource::make($houseData)
        );
    }

}
