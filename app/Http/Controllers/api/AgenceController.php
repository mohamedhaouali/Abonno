<?php

namespace App\Http\Controllers\Api;

use App\Agence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agence as AgenceResource;

class AgenceController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $agences = Agence::all();

        $geoJSONdata = $agences->map(function ($agence) {
            return [
                'type'       => 'Feature',
                'properties' => new AgenceResource($agence),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $agence->longitude,
                        $agence->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
