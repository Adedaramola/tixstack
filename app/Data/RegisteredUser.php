<?php

declare(strict_types=1);

namespace App\Data;

use App\Contracts\DataObjectContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

final class RegisteredUser implements DataObjectContract
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function from(Request $request): self
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
    }
}
