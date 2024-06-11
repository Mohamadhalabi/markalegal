<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index() {
        $posts = Guide::all();
        return response()->view('sitemap', [
            'guides' => $posts
        ])->header('Content-Type', 'text/xml');
      }
}
