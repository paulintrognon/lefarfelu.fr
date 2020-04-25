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

    public function preview(Page $page, PageHistory $history)
    {
        return view('backend.page.preview', [
            'page' => $page,
            'history' => $history,
        ]);
    }

    /**
     * Replace the active page content by the content of given $history
     */
    public function restore(Page $page, PageHistory $history)
    {
        $page->update([
            'content' => $history->content,
        ]);
        return redirect()->route('admin.page.edit', $page)->withFlashSuccess('Page restaurée !');;
    }
}
