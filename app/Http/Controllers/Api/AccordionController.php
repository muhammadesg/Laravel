<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accordion;
use App\Http\Requests\StoreAccordionRequest;
use App\Http\Requests\UpdateAccordionRequest;

class AccordionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/accordions",
     *     tags={"Accordions"},
     *     summary="Get list of accordions",
     *     @OA\Response(response="200", description="List of locations")
     * )
     */
    public function index() {
        try {
            $accordions = Accordion::all();
            return response()->json($accordions, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/accordions/{id}",
     *     tags={"Accordions"},
     *     summary="Get a specific location",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Accordion ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Accordion details"),
     *     @OA\Response(response="404", description="Accordion not found"),
     * )
     */
    public function show(Accordion $accordion) {
        try {
            return response()->json(['accordion' => $accordion], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/accordions",
     *     tags={"Accordions"},
     *     summary="Create a new accordion",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="tel", type="number"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="location", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Accordion created successfully"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function store(StoreAccordionRequest $request) {
        try {
            $this->validate($request, [
                'address' => 'required',
                'tel' => 'required',
                'email' => 'required|email',
                'location' => 'required',
            ]);

            Accordion::create($request->all());

            return response()->json(['message' => 'Accordion added successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error adding accordion'], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/accordions/{id}",
     *     tags={"Accordions"},
     *     summary="Update a specific accordion",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Accordion ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="tel", type="number"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="location", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Accordion updated successfully"),
     *     @OA\Response(response="404", description="Accordion not found"),
     *     @OA\Response(response="422", description="Validation error"),
     * )
     */
    public function update(UpdateAccordionRequest $request, Accordion $accordion) {
        try {
            $this->validate($request, [
                'address' => 'required',
                'tel' => 'required',
                'email' => 'required|email',
                'location' => 'required',
            ]);

            $accordion->update($request->all());

            return response()->json(['message' => 'Accordion updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating accordion'], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/accordions/{id}",
     *     tags={"Accordions"},
     *     summary="Delete a specific accordion",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Accordion ID",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(response="200", description="Accordion deleted successfully"),
     *     @OA\Response(response="404", description="Accordion not found"),
     * )
     */
    public function destroy(Accordion $accordion) {
        try {
            $accordion->delete();
            return response()->json(['message' => 'Accordion deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting accordion'], 500);
        }
    }
}
