<?php

namespace App\Helpers;

use Illuminate\Support\ServiceProvider;

class Constantes extends ServiceProvider
{
    // Mensajes de error
    const PERMISO_DENEGADO = 'No tienes permiso para realizar esta acción.';
    const ACCESO_DENEGADO = 'Por favor, inicie sesión en el sistema para acceder al contenido.';
    const DENEGADO_ELIMINARSE = 'No puedes eliminar a tu propio usuario.';
    const NO_ES_PETICION_AJAX = 'Error: Petición Denegada - Esta acción solo se puede ejecutar desde una llamada Ajax.';

    // Estados de verdad y falso
    const TRUE = 'TRUE';
    const FALSE = 'FALSE';

    // Estados de clínicas
    const PENDIENTE = 'Pendiente';
    const APROBADO = 'Aprobado';

    // Roles de usuario
    const ADMINISTRADOR = 'Administrador';
    const USUARIO = 'Usuario';

    /* Mensajes */

    public static function CREACION_EXITO($elemento)
    {
        return Constantes::MENSAJE_EXITO($elemento, 'creó');
    }

    public static function MODIFICACION_EXITO($elemento)
    {
        return Constantes::MENSAJE_EXITO($elemento, 'modificó');
    }

    public static function ELIMINACION_EXITO($elemento)
    {
        return Constantes::MENSAJE_EXITO($elemento, 'eliminó');
    }

    public static function MENSAJE_EXITO($elemento, $accion)
    {
        return sprintf('%s se %s exitosamente!', $elemento, $accion);
    }
    
    public static function PRIVILEGIO_DENEGADO($vista = null)
    {
        return sprintf('No tienes privilegios para ver %s.', is_null($vista) ? 'esta página' : 'la página '.strtolower($vista));
    }
    
    public static function ERROR_POR_DEFECTO($mensaje = null)
    {
        return sprintf('Algo salió %s<br>Por favor, inténtelo de nuevo más tarde.', is_null($mensaje) ? "mal." : "mal:<br>".mensaje);
    }
}
