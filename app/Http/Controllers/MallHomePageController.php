<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class MallHomePageController extends BaseController
{
    public function index(): View
    {
        return view('mall.index', [
            'title' => 'Mall',
        ]);
    }
}
