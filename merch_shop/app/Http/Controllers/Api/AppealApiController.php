<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealApiRequest;
use App\Http\Requests\AppealFormRequest;
use App\Models\Appeal;
use App\OpenApi\Parameters\AppealsParameters;
use App\OpenApi\Responses\FailedValidationResponse;
use App\OpenApi\Responses\SuccessValidationResponse;
use App\Sanitizers\PhoneSanitizer;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class AppealApiController extends Controller
{
    /**
     * Sending appeals to the db.
     * @param AppealApiRequest
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['appeals'], method: 'POST')]
    #[OpenApi\Parameters(factory: AppealsParameters::class)]
    #[OpenApi\Response(factory: FailedValidationResponse::class, statusCode: 422)]
    #[OpenApi\Response(factory: SuccessValidationResponse::class, statusCode: 200)]
    public function store(AppealApiRequest  $request)
    {
        $data = $request->validated();

        Appeal::createFormRequest($data);

        return response()->json([
            'message' => 'Successful'], 200
        );
    }
}
