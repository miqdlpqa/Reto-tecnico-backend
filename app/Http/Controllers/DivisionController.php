<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;


class DivisionController extends Controller
{

    public function index()
    {
        $divisions = Division::with(['parent', 'children'])->get();
        return response()->json(['data' => $divisions], 200);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:45|unique:divisions,name',
            'parent_id' => 'nullable|exists:divisions,id',
            'level' => 'required|integer|min:1',
            'collaborators' => 'required|integer|min:0',
            'ambassador' => 'nullable|string|max:255'
        ]);

        $division = Division::create($validated);
        return response()->json(['data' => $division->load(['parent', 'children'])], 201);
    }

    public function show($id)
    {
        $division = Division::with(['parent', 'children'])->find($id);
        
        if (!$division) {
            return response()->json(['message' => 'División no encontrada'], 404);
        }

        return response()->json(['data' => $division], 200);
    }

    public function update(Request $request, $id)
    {
        $division = Division::find($id);

        if (!$division) {
            return response()->json(['message' => 'División no encontrada'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:45|unique:divisions,name,' . $id,
            'parent_id' => 'nullable|exists:divisions,id',
            'level' => 'sometimes|integer|min:1',
            'collaborators' => 'sometimes|integer|min:0',
            'ambassador' => 'nullable|string|max:255'
        ]);

        $division->update($validated);
        return response()->json(['data' => $division->load(['parent', 'children'])], 200);
    }

    public function destroy($id)
    {
        $division = Division::find($id);

        if (!$division) {
            return response()->json(['message' => 'División no encontrada'], 404);
        }

        $division->delete();
        return response()->json(null, 204);
    }

    public function subdivisions($id)
    {
        $division = Division::find($id);

        if (!$division) {
            return response()->json(['message' => 'División no encontrada'], 404);
        }

        $subdivisions = $division->children()->with(['parent', 'children'])->get();
        return response()->json(['data' => $subdivisions], 200);
    }
}


