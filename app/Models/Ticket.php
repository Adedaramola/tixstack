<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;
    use HasUlids;

    use HasFactory;
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
