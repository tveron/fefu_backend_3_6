<?php

namespace App\OpenApi\Responses\catalog\categories;

use App\OpenApi\Schemas\CategorySchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema as ObjectsSchema;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;


class ShowCategoriesResponse extends ResponseFactory
{
    public function build(): Response
    {
        return Response::ok()
            ->description('Successful response')
            ->content(
                MediaType::json()->schema(
                    ObjectsSchema::object()->properties(
                        CategorySchema::ref('data')
                    )
                )
            );
    }
}
