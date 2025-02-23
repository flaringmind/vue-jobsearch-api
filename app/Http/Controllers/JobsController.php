<?php

namespace App\Http\Controllers;

use App\Services\VuejobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function __construct(
        private VuejobService $vuejobService,
    )
    {}

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->vuejobService->getFormattedJobs();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $responseId = $this->vuejobService->createJob($request);
        return response()->json(['id' => $responseId], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->vuejobService->getFormattedJob($id);

        return response()->json([...$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $this->vuejobService->updateJob($request, $id);
        return response()->json(['id' => $id], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->vuejobService->deleteJob($id);
        return response()->json(['message' => 'Job has been deleted successfully'], 204);
    }
}
