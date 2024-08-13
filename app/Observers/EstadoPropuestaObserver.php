<?php

namespace App\Observers;

use App\Models\Propuestas;
use App\Models\ReportesPropuestas;

class EstadoPropuestaObserver
{
    /**
     * Handle the Propuestas "created" event.
     */
    public function created(Propuestas $propuestas): void
    {
        if ($propuestas->isDirty('pro_proceso')) {
            $existe = ReportesPropuestas::where('pro_id', $propuestas->pro_id)
                ->where('estado_nuevo', $propuestas->pro_proceso)
                ->exists();

            if (!$existe) {
                ReportesPropuestas::create([
                    'pro_id' => $propuestas->pro_id,
                    'estado_anterior' => 'Curado',
                    'estado_nuevo' => $propuestas->pro_proceso,
                ]);
            }
        }
    }

    /**
     * Handle the Propuestas "updated" event.
     */
    public function updated(Propuestas $propuestas): void
    {
        if ($propuestas->isDirty('pro_proceso')) {
            $existe = ReportesPropuestas::where('pro_id', $propuestas->pro_id)
                ->where('estado_nuevo', $propuestas->pro_proceso)
                ->exists();

            if (!$existe) {
                ReportesPropuestas::create([
                    'pro_id' => $propuestas->pro_id,
                    'estado_anterior' => $propuestas->getOriginal('pro_proceso'),
                    'estado_nuevo' => $propuestas->pro_proceso,
                ]);
            }
        }
    }

    /**
     * Handle the Propuestas "deleted" event.
     */
    public function deleted(Propuestas $propuestas): void
    {
        //
    }

    /**
     * Handle the Propuestas "restored" event.
     */
    public function restored(Propuestas $propuestas): void
    {
        //
    }

    /**
     * Handle the Propuestas "force deleted" event.
     */
    public function forceDeleted(Propuestas $propuestas): void
    {
        //
    }
}
