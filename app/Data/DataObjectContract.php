<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Http\Request;

interface DataObjectContract
{
    public static function from(Request $request): self;

    public function toArray(): array;
}
