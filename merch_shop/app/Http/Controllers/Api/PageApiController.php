<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Responsable;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\PagesResources;
use App\Models\Page;
use App\OpenApi\Responses\ListPagesResponse;
use App\OpenApi\Responses\NotFoundResponse;
use App\OpenApi\Responses\ShowPagesResponse;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]


class PageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['pages'])]
    #[OpenApi\Response(factory: ListPagesResponse::class, statusCode: 200)]
    public function index()
    {
        return PagesResources::collection(
            Page::query()->paginate(5)
        );
    }


    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['pages'])]
    #[OpenApi\Response(factory: ShowPagesResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponse::class, statusCode: 404)]
    public function show(string $slug)
    {
        return new PagesResources(
            Page::query()->where('slug', $slug)->firstOrFail()
        );
    }

}
