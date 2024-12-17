<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Get a list of all services.
     *
     * @return JsonResponse
     */
    public function getServices(): JsonResponse
    {
        $services = Service::all();
        return response()->json(['data' => $services], 200);
    }
}
