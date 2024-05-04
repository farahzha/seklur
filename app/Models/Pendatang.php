<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendatang extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function penduduk():BelongsTo
    {
        return $this->belongsTo( Penduduk::class );
    }

    public function scopeFilter( Builder $query, array $filters ): void
    {
        $query->when( $filters[ 'search' ] ?? false, function ($query, $search) {
            $query->where( 'nama', 'like', '%' . $search . '%' )
                ->orWhere( 'nik', 'like', '%' . $search . '%' );
        } );
    }
}
