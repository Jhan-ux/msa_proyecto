<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'categoria_vendedor',
        'telefono',
        'activo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return (bool) ($this->activo ?? true);
    }

    /**
     * Comprobar si el usuario es Administrador
     */
    public function isAdmin(): bool
    {
        return ($this->role ?? 'admin') === 'admin';
    }

    /**
     * Comprobar si el usuario es Vendedor
     */
    public function isVendedor(): bool
    {
        return $this->role === 'vendedor';
    }

    /**
     * Comprobar si puede acceder a cotizaciones de una categoría específica
     */
    public function canAccessCategory(?string $category): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        $vendedorCat = $this->categoria_vendedor ?? 'todos';

        if ($vendedorCat === 'todos') {
            return true;
        }

        if (empty($category) || $category === 'general') {
            return true;
        }

        return strtolower($vendedorCat) === strtolower($category);
    }

    /**
     * Cotizaciones asignadas al vendedor
     */
    public function contactosAsignados()
    {
        return $this->hasMany(Contacto::class, 'vendedor_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'activo'            => 'boolean',
        ];
    }
}
