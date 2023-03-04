<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

final class RegisteredUser implements DataObjectContract
{
    public function __construct(
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    public static function from(Request $request): self
    {
        return new self(
            $request->firstname,
            $request->lastname,
            $request->email,
            $request->password,
        );
    }

    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
    }
}
