<?php

declare(strict_types=1);

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class EventsController extends Controller
{
    public function index(Request $request): View
    {
        return view('dashboard.index');
    }
}
