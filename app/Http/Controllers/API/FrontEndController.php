<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        // get carousel from news
        try {
            $news = News::latest()->limit(3)->get();

            return ResponseFormatter::success(
                $news,
                'Data berita berhasil di tambah'
            );
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }
}
