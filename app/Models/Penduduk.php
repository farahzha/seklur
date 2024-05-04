<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kartuKeluarga(): BelongsTo
    {
        return $this->belongsTo(KartuKeluarga::class, 'nik', 'nik');
    }

    public function anggotaKeluarga(): HasOne
    {
        return $this->hasOne( AnggotaKeluarga::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%')
                ->orWhereHas( 'kartuKeluarga', function ($query) use ($search) {
                    $query->where( 'no_kk', 'like', '%' . $search . '%' );
                } );
        });
    }
}
