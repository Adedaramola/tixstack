<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Ticket extends Model
{
    use HasFactory;
    use HasFactory;

    use HasUlids;
    use HasUlids;

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function perks(): HasMany
    {
        return $this->hasMany(TicketPerk::class);
    }
}
