<?php

declare(strict_types=1);

namespace App\Http\Controllers\ShortUrl;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ShortUrlController extends Controller
{
    public function store(StoreShortUrlRequest $request)
    {
        $shortUrl = ShortUrl::create([
            'user_id' => $request->user()->id,
            'slug' => $request->input('slug'),
            'destination_url' => $request->input('destination_url'),
        ]);

        return new JsonResponse([
            'data' => [
                'id' => $shortUrl->id,
            ],
        ], Response::HTTP_CREATED);
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('ShortUrl/Form');
    }
}
