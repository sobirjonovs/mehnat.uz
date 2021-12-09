<?php

namespace App\Http\Controllers\Api\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\Api\OrganizationResource;
use App\Models\Organization\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return OrganizationResource::collection(Organization::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrganizationRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrganizationRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new OrganizationResource(auth()->user()->organization()->create($request->validated())),
            'message' => 'Created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Organization $organization
     * @return OrganizationResource
     */
    public function show(Organization $organization): OrganizationResource
    {
        return new OrganizationResource($organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrganizationRequest $request
     * @param Organization $organization
     * @return JsonResponse
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization): JsonResponse
    {
        $organization->update($request->validated());

        return response()->json([
            'data' => new OrganizationResource($organization),
            'message' => 'Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Organization $organization
     * @return JsonResponse
     */
    public function destroy(Organization $organization): JsonResponse
    {
        $organization->delete();

        return response()->json([
            'data' => $organization,
            'message' => 'Deleted',
        ]);
    }
}
