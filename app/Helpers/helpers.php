<?php

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
