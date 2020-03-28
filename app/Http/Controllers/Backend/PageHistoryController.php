<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Page\StorePageRequest;
use App\Models\PageHistory;

/**
 * Class PageHistoryController.
 */
class PageHistoryController extends Controller
{
    /**
     * List all past versions of a page
     * @return \Illuminate\View\View
     */
    public function list(Page $page)
    {
        $histories = $page->histories()->latest()->take(100)->get();
        return view('backend.page.history', [
            'page' => $page,
            'histories' => $histories,
        ]);
    }
}
