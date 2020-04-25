<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Page\StorePageRequest;
use App\Http\Requests\Backend\Page\UpdatePageRequest;
use App\Models\PageHistory;

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
        $page->lastEditBy()->associate($user);
        $page->save();
        return redirect()
            ->route('admin.page.list')
            ->withFlashSuccess('La page a été créée avec succès !');
    }

    /**
     * Show form for editing an existing page
     * @return \Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('backend.page.edit', [
            'page' => $page,
        ]);
    }

    /**
     * Update the page in the database
     */
    public function update(Page $page, UpdatePageRequest $request)
    {
        $user = auth()->guard('web')->user();

        // Save new page
        $page->title = $request->title;
        $page->urlPath = $request->urlPath ?? '';
        $page->content = $request->content;
        $page->lastEditBy()->associate($user);
        $page->save();

        // Save the new page in history
        $pageHistory = new PageHistory([
            'title' => $page->title,
            'urlPath' => $page->urlPath,
            'content' => $page->content,
        ]);
        $pageHistory->editedBy()->associate($page->lastEditBy);
        $pageHistory->page()->associate($page);
        $pageHistory->save();

        return redirect()
            ->route('admin.page.edit', $page)
            ->withFlashSuccess('La page a été modifiée avec succès !');
    }
}
