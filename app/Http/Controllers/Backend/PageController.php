<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Page\StorePageRequest;

/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * List all pages
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $pages = Page::all();
        return view('backend.page.list', [
            'pages' => $pages,
        ]);
    }

    /**
     * Show form for creating a new page
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Create a new page and stores it in the database
     */
    public function store(StorePageRequest $request)
    {
        $user = auth()->guard('web')->user();
        $page = new Page([
            'title' => $request->title,
            'urlPath' => $request->urlPath,
            'content' => $request->content,
        ]);
        $page->createdBy()->associate($user);
        $page->save();
        return redirect()
            ->route('admin.page.list')
            ->withFlashSuccess('La page a été créée avec succès !');
    }
}
