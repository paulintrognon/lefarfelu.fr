<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(string $slug)
    {
        $page = Page::getFromPath($slug);
        if ($page === null) {
            abort(404);
        }
        return view('frontend.index', [
            'title' => $page->title,
            'content' => $page->html(),
        ]);
    }
}
