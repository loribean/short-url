<?php

declare(strict_types=1);

namespace App\Http\Controllers\ShortUrl;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShortUrlDestinationController extends Controller
{
    public function index($slug)
    {
        try {
            $shortUrl = ShortUrl::where('slug', $slug)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        return redirect($shortUrl->destination_url);
    }
}
