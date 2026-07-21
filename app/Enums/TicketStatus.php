<?php

namespace App\Enums;

enum TicketStatus: string
{
    case Pendiente = 'pendiente';
    case EnProceso = 'en_proceso';
    case Resuelto = 'resuelto';
    case Cerrado = 'cerrado';

    public function label(): string
    {
        return match ($this) {
            self::Pendiente => 'Pendiente',
            self::EnProceso => 'En proceso',
            self::Resuelto => 'Resuelto',
            self::Cerrado => 'Cerrado',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::Pendiente => 'bg-gray-100 text-gray-700 border border-gray-200',
            self::EnProceso => 'bg-blue-100 text-blue-700 border border-blue-200',
            self::Resuelto => 'bg-teal-100 text-teal-700 border border-teal-200',
            self::Cerrado => 'bg-slate-200 text-slate-600 border border-slate-300',
        };
    }

    /**
     * El usuario final no puede modificar tickets en estos estados.
     */
    public function isLocked(): bool
    {
        return $this === self::Cerrado;
    }

    /**
     * Transiciones permitidas desde este estado (evita saltos ilógicos).
     */
    public function allowedTransitions(): array
    {
        return match ($this) {
            self::Pendiente => [self::EnProceso, self::Cerrado],
            self::EnProceso => [self::Resuelto, self::Pendiente, self::Cerrado],
            self::Resuelto => [self::Cerrado, self::EnProceso],
            self::Cerrado => [],
        };
    }

    public static function options(): array
    {
        return array_map(fn (self $case) => [
            'value' => $case->value,
            'label' => $case->label(),
        ], self::cases());
    }
}
