<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meninggal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo( Penduduk::class );
    }

    public function scopeFilter( Builder $query, array $filters ): void
    {
        $query->when( $filters[ 'search' ] ?? false, function ($query, $search) {
            $query->join( 'penduduks', 'meninggals.penduduk_id', '=', 'penduduks.id' )
                ->where( 'penduduks.nama', 'like', '%' . $search . '%' )
                ->orWhere( 'penduduks.nik', 'like', '%' . $search . '%' )
                ->orWhere( 'meninggals.keterangan', 'like', '%' . $search . '%' );

            // Mematikan orderBy otomatis
            $query->getQuery()->orders = [];

            // Menentukan orderBy sesuai dengan tabel yang diinginkan
            $query->orderBy( 'meninggals.created_at', 'desc' );
        } );
    }
}
