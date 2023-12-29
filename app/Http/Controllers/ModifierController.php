<?php

namespace App\Http\Controllers;

use App\Models\Modifier;
use App\Http\Requests\StoreModifierRequest;
use App\Http\Requests\UpdateModifierRequest;

class ModifierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort = $this->sort($request);
        $modifiers = Modifier::filter($request->all())
            ->orderBy($sort['column'], $sort['order'])
            ->paginate((int) $request->get('perPage', 10));
        return response()->json(
            [
                'items' => ModifierResource::collection($modifiers->items()),
                'pagination' => $this->pagination($modifiers),
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
    public function store(StoreModifierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Modifier $modifier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modifier $modifier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModifierRequest $request, Modifier $modifier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modifier $modifier)
    {
        //
    }
}
