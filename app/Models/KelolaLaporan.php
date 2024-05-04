<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelolaLaporan extends Model
{
    use HasFactory;

    public function penduduk(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }

    public function kartu_keluarga(): HasMany
    {
        return $this->hasMany(KartuKeluarga::class);
    }
    
    public function kelahiran(): HasMany
    {
        return $this->hasMany(Lahir::class);
    }

    public function kematian(): HasMany
    {
        return $this->hasMany(Meninggal::class);
    }

    public function pindah(): HasMany
    {
        return $this->hasMany(Pindah::class);
    }

    public function datang(): HasMany
    {
        return $this->hasMany(Pendatang::class);
    }
    
}
