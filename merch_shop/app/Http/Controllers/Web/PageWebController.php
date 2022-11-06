<?php

namespace App\Http\Controllers\Web;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
