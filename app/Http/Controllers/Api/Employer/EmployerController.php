<?php

namespace App\Http\Controllers\Api\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Http\Resources\Api\EmployerResource;
use App\Models\Employer\Employer;
use App\Models\Organization\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return EmployerResource::collection(auth()->user()->organization->employers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployerRequest $request
     * @param Organization $organization
     * @return JsonResponse
     */
    public function store(StoreEmployerRequest $request, Organization $organization): JsonResponse
    {
        return response()->json([
            'data' => new EmployerResource(
                $organization->employers()->create($request->validated())
            ),
            'message' => 'Created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Employer $employer
     * @return EmployerResource
     */
    public function show(Employer $employer): EmployerResource
    {
        return new EmployerResource(
            auth()->user()->organization->findEmployer($employer->id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployerRequest $request
     * @param Employer $employer
     * @return JsonResponse
     */
    public function update(UpdateEmployerRequest $request, Employer $employer): JsonResponse
    {
        $employer = auth()->user()->organization->findEmployer($employer->id);
        $employer->update($request->validated());

        return response()->json([
            'data' => new EmployerResource($employer),
            'message' => 'Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employer $employer
     * @return JsonResponse
     */
    public function destroy(Employer $employer): JsonResponse
    {
        auth()->user()->organization->findEmployer($employer->id)->delete();

        return response()->json([
            'data' => $employer,
            'message' => 'Deleted',
        ]);
    }
}
