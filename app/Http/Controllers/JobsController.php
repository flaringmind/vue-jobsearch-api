<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrCreateRequest;
use App\Http\Resources\VuejobResource;
use App\Models\Vuejob;
use App\Services\VuejobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JobsController extends Controller
{

    public function __construct(
        private VuejobService $vuejobService,
    )
    {
    }

    public function index(): ResourceCollection
    {
        return $this->vuejobService->getFormattedJobs();
    }

    public function show(Vuejob $job): VuejobResource
    {
        return $this->vuejobService->getFormattedJob($job);
    }

    public function store(UpdateOrCreateRequest $request)
    {
        $createdJobId = $this->vuejobService->createJob($request);
        return response()->json(['id' => $createdJobId], 201);
    }

    public function update(UpdateOrCreateRequest $request, Vuejob $job)
    {
        $jobId = $this->vuejobService->updateJob($request, $job);
        return response()->json(['id' => $jobId], 201);
    }

    public function destroy(Vuejob $job): JsonResponse
    {
        $this->vuejobService->deleteJob($job);
        return response()->json(['message' => 'Job has been deleted successfully'], 204);
    }
}
