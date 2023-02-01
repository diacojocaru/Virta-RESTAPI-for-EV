<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchStations;
use App\Http\Requests\StoreStation;
use App\Http\Requests\UpdateStation;
use App\Http\Resources\Station as StationResource;
use App\Http\Resources\StationCollection;
use App\Models\Station;
use App\Services\StationService;

class StationsController extends Controller
{
    protected StationService $stationService;

    public function __construct(StationService $stationService)
    {
        $this->stationService = $stationService;
    }

    public function search(SearchStations $request)
    {
        $latitude = (float) $request->input('latitude');
        $longitude = (float) $request->input('longitude');
        $companyId = $request->input('company_id');
        $distance = (float) $request->input('distance', 2);

        $stations = $this->stationService->nearestStations($latitude, $longitude, $distance, $companyId);

        return new StationCollection($stations);
    }

    public function index()
    {
        $paginatedStations = $this->stationService->paginatedList();

        return new StationCollection($paginatedStations);
    }

    public function store(StoreStation $request)
    {
        $dto = $request->dto();

        $station = $this->stationService->create($dto);

        return new StationResource($station);
    }

    public function show(Station $station)
    {
        return new StationResource($station);
    }

    public function update(UpdateStation $request, Station $station)
    {
        $dto = $request->dto();

        $this->stationService->update($station, $dto);

        return new StationResource($station);
    }

    public function destroy(Station $station)
    {
        $this->stationService->delete($station);

        return response()->json([]);
    }
}
