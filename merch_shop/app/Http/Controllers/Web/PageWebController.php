<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Responsable;
use App\Models\Page;
use function App\Http\Controllers\abort;
use function App\Http\Controllers\view;

class PageWebController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     * @return Responsable
     */
    public function index()
    {
        $listPage = Page::paginate(5);
        return view('listPage', ['listPage' => $listPage]);
    }


    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Responsable
     *
     */
    public function show(string $slug)
    {
        $page = Page::query()
            ->where('slug', $slug)->first();

        if ($page === null) {
            abort(404);
        }
        return view('page', ['page' => $page]);
    }
}
