<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'location',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'is_published',
        'is_visible',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_visible' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    protected static function booted(): void
    {
        static::created(function (Event $event): void {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->name);
            }
        });
    }
}
