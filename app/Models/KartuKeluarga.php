<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo( Penduduk::class, 'nik', 'nik' );
    }

    public function lahir(): HasMany
    {
        return $this->hasMany( Lahir::class);
    }

    public function anggotaKeluarga(): HasMany
    {
        return $this->hasMany( AnggotaKeluarga::class );
    }

    public function scopeFilter( Builder $query, array $filters ): void
    {
        $query->when( $filters[ 'search' ] ?? false, function ($query, $search) {
            $query->where( 'no_kk', 'like', '%' . $search . '%' )
                ->orWhere( 'nik', 'like', '%' . $search . '%' )
                ->orWhereHas( 'penduduk', function ($query) use ($search) {
                    $query->where( 'nama', 'like', '%' . $search . '%' );
                } );
        } );
    }
}
