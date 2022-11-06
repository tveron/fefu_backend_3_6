<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\AppealFormRequest;
use App\Models\Appeal;
use App\Sanitizers\PhoneSanitizer;
use App\Http\Controllers\Controller;

class AppealWebController extends Controller
{
    public function form()
    {
        return view('appeal', ['success' => session('success', false)]);
    }

    public function send(AppealFormRequest $request)
    {
        $data = $request->validated();
        Appeal::createFormRequest($data);

        return redirect(route('appeal.form'))->with(['success' => true]);
    }
}
