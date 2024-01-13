<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/banners",
     *     tags={"Banners"},
     *     summary="Get list of banners",
     *     @OA\Response(response="200", description="List of banners")
     * )
     */
    public function index()
    {
        $banners = Banner::all();

        $banners->each(function ($banner) {
            $banner->img_url = asset('storage/' . $banner->image);
        });

        return response()->json($banners);
    }

     /**
     * @OA\Post(
     *     path="/api/banners",
     *     tags={"Banners"},
     *     summary="Store a new banner",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "text", "image"},
     *                 @OA\Property(property="title", type="string", example="Banner Title"),
     *                 @OA\Property(property="text", type="string", example="Banner Text"),
     *                 @OA\Property(property="image", type="string", format="binary"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="201", description="Banner created successfully"),
     *     @OA\Response(response="422", description="Validation error")
     * )
     */
    public function store(StoreBannerRequest $request)
    {
        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
        }

        $requestData = $request->validated();
        $requestData['image'] = $path;
        Banner::create($requestData);

        return response()->json(['message' => 'Banner created successfully'], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/banners/{id}",
     *     tags={"Banners"},
     *     summary="Get details of a specific banner",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the banner",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Banner details"),
     *     @OA\Response(response="404", description="Banner not found"),
     * )
     */
    public function show($id) {
        $banner = Banner::findOrFail($id);
        return response()->json($banner, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/banners/{id}",
     *     tags={"Banners"},
     *     summary="Update details of a specific banner",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the banner",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"title", "text", "image"},
     *                 @OA\Property(property="title", type="string", example="Updated Banner Title"),
     *                 @OA\Property(property="text", type="string", example="Updated Banner Description"),
     *                 @OA\Property(property="image", type="string",  example="Image Title"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Banner updated successfully"),
     *     @OA\Response(response="404", description="Banner not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(UpdateBannerRequest $request, $id) {
        $banner = Banner::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
        ]);

        $requestData = $request->all();

        $banner->update($requestData);

        return response()->json(['message' => 'Banner updated successfully'], 201);

    }

    /**
     * @OA\Delete(
     *     path="/api/banners/{id}",
     *     tags={"Banners"},
     *     summary="Delete a banner",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the banner to delete",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="202", description="Banner deleted successfully"),
     *     @OA\Response(response="404", description="Banner not found"),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function destroy(Banner $banner) {
        $banner->delete();
        return response()->json("Successfully deleted!!", 202);
    }
}
