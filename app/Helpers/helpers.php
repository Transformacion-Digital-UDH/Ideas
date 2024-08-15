<?php

use Illuminate\Support\Carbon;

function determinar_rol($email)
{
    if (preg_match('/^\d+@udh\.edu\.pe$/', $email)) {
        $role = 'ESTUDIANTE';
    } elseif (strpos($email, '@udh.edu.pe') !== false) {
        $role = 'DOCENTE';
    } else {
        $role = 'SOCIEDAD';
    }

    return $role;
}

// Devolver fecha tipo: 26/02/2024, 09:37 AM
function fechaHora($datetime)
{
  if (!$datetime instanceof Carbon) {
    $datetime = new Carbon($datetime);
  }
  return $datetime->format('d/m/Y, h:i A');
}