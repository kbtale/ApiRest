<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRoleStoreRequest;
use App\Http\Requests\UserRoleUpdateRequest;
use App\Http\Resources\UserRoleEditResource;
use App\Http\Resources\UserRoleResource;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserRoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $sort = $this->sort($request);
        $roles = UserRole::filter($request->all())
            ->orderBy($sort['column'], $sort['order'])
            ->paginate((int) $request->get('perPage', 10));

        return response()->json(
            [
                'items' => UserRoleResource::collection($roles->items()),
                'pagination' => $this->pagination($roles),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRole $userRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRoleRequest $request, UserRole $userRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $userRole)
    {
        //
    }
}
