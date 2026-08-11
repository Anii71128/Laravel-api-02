<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;
use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
use Illuminate\Http\Response;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->paginate(10);

        return response()->json(
            KategoriResource::collection($kategori),
            Response::HTTP_OK
        );
    }

    public function store(KategoriRequest $request)
    {
        $kategori = Kategori::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Kategori created successfully',
            'data' => new KategoriResource($kategori),
        ], Response::HTTP_CREATED);
    }

    public function show(Kategori $kategori)
    {
        return response()->json([
            'status' => true,
            'message' => 'Detail Kategori',
            'data' => new KategoriResource($kategori),
        ], Response::HTTP_OK);
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Kategori updated successfully',
            'data' => new KategoriResource($kategori),
        ], Response::HTTP_OK);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json([
            'status' => true,
            'message' => 'Kategori deleted successfully',
        ], Response::HTTP_OK);
    }
}
