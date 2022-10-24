<?php

declare(strict_types=1);

namespace App\Http\Controllers\ShortUrl;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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

    public function index(Request $request)
    {
        $data = $request->user()->shortUrls;

        return Inertia::render('ShortUrl/List', [
            'short_urls' => Auth::user()->shortUrls()->orderBy('id')
            ->paginate(10)
            ->through(fn ($shortUrl) => [
                'id' => $shortUrl->id,
                'slug' => $shortUrl->slug,
                'destination_url' => $shortUrl->destination_url,
            ]),
        ]);
    }
}
