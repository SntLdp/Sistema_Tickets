<?php

namespace App\Enums;

enum TicketPriority: string
{
    case Alta = 'alta';
    case Moderada = 'moderada';
    case Baja = 'baja';

    public function label(): string
    {
        return match ($this) {
            self::Alta => 'Alta',
            self::Moderada => 'Moderada',
            self::Baja => 'Baja',
        };
    }

    /**
     * Clase Tailwind del badge de color para esta prioridad.
     */
    public function badgeClass(): string
    {
        return match ($this) {
            self::Alta => 'bg-red-100 text-red-700 border border-red-200',
            self::Moderada => 'bg-amber-100 text-amber-700 border border-amber-200',
            self::Baja => 'bg-green-100 text-green-700 border border-green-200',
        };
    }

    public function dotColor(): string
    {
        return match ($this) {
            self::Alta => 'bg-red-500',
            self::Moderada => 'bg-amber-500',
            self::Baja => 'bg-green-500',
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
