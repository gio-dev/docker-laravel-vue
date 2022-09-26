<?php

namespace App\Http\Controllers;

use App\Core\Resources\AppAnonymousResourceCollection;
use App\Http\Requests\CreateUpdateHomeAppliancesRequest;
use App\Http\Resources\HomeAppliancesResource;
use App\Services\HomeAppliancesService;
use Illuminate\Http\JsonResponse;

class HomeApplianceController extends Controller
{

    /**
     * @var HomeAppliancesService
     */
    protected $homeApplianceService;

    /**
     * HomeApplianceController constructor.
     * @param HomeAppliancesService $homeApplianceService
     */
    public function __construct(HomeAppliancesService $homeApplianceService)
    {
//        $this->middleware(['auth:api']);
        $this->homeApplianceService = $homeApplianceService;

    }

    public function index(): AppAnonymousResourceCollection
    {
        $clients = $this->homeApplianceService->search();
        return HomeAppliancesResource::collection($clients);
    }

    public function store(CreateUpdateHomeAppliancesRequest $request): JsonResponse
    {
        $homeAppliance = $this->homeApplianceService->storeNew($request->all());
        return $this->responseCreated('Home Appliance created successfully', new HomeAppliancesResource($homeAppliance));
    }

    public function show($identity): JsonResponse
    {
        $homeAppliance = $this->homeApplianceService->findOneById($identity);
        return $this->responseSuccess('Home Appliance found', new HomeAppliancesResource($homeAppliance));
    }

    public function update(CreateUpdateHomeAppliancesRequest $request, $identity): JsonResponse
    {
        $homeAppliance = $this->homeApplianceService->changeById($identity, $request->all());
        return $this->responseSuccess('Home Appliance updated Successfully', new HomeAppliancesResource($homeAppliance));
    }

    public function destroy($identity): JsonResponse
    {
        $this->homeApplianceService->deleteById($identity);
        return $this->responseDeleted();
    }

    public function brands(): JsonResponse
    {
        $listBrands = $this->homeApplianceService->getBrandsList();
        return $this->responseSuccess('Home Appliance updated Successfully', $listBrands);
    }
}
