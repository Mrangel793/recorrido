<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stands = Stand::with(['company', 'media'])->get();

        return response()->json($stands->map(function ($stand) {
            $company = $stand->company;
            $companyData = [
                'name' => $company ? $company->name : null,
                'description' => $company ? $company->description : null,
                'logo' => $company ? url('storage/' . $company->logo) : null,
                'social_links' => $company && $company->social_links ? json_decode($company->social_links) : null,
            ];

            return [
                'id' => $stand->id,
                'name' => $stand->name,
                'company' => $companyData,
                'media' => $stand->media->map(function ($media) {
                    return [
                        'id' => $media->id,
                        'file_path' => url('storage/' . $media->file_path),
                    ];
                }),
            ];
        }));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stand = Stand::with(['company', 'media'])->findOrFail($id);

        return response()->json([
            'id' => $stand->id,
            'name' => $stand->name,
            'description' => $stand->description,
            'location' => $stand->location,
            'company' => [
                'name' => $stand->company->name,
                'description' => $stand->company->description,
                'logo' => url('storage/' . $stand->company->logo),
                'social_links' => $stand->company->social_links ? json_decode($stand->company->social_links) : null,
            ],
            // Multimedia asociada al stand
            'media' => $stand->media->map(function ($media) {
                return [
                    'id' => $media->id,
                    'file_path' => url('storage/' . $media->file_path),
                ];
            }),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stand = Stand::findOrFail($id);
        $stand->update(['id_company' => $request->id_company]);

        return response()->json(['message' => 'Stand asignado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
