# ProfAsist-Servicios-PHP
Dedicado a los servicios PHP para de desarrollo del proyecto ProfAsist en el Desarrollo de aplicaciones moviles en el Curso 2ºDAM
[ProfAsit-Android](https://github.com/davidbelesp/ProAssist)

# Funcionalidades
Las funcionalidades de estos servicios van dedicados a manejo de acciones CRUD sobre la Base de datos

## Alta de asistencia

Crear una falta de asistencia del usuario.
Servicio: [add-faltas.php](https://github.com/santiagoieshna/ProfAsist-Servicios-PHP/blob/main/add-faltas.php)

## Obtener faltas del dia actual
Devuelve informacion sobre el profesor que falta, su grupo y hora respectiva de la falta de asistencia del dia actual
Devuelve un array en formato JSON:
```
[
    {
        "nombre":"Nieves",
        "apellido":"Tejeda",
        "hora":"1",
        "dia":"Monday",
        "Grupo":"2DAM"    
    }
]
```

Servicio: [get-faltas-today.php](https://github.com/santiagoieshna/ProfAsist-Servicios-PHP/blob/main/get-faltas-today.php)

## Obtener faltas del dia siguiente
Devuelve informacion sobre el profesor que falta, su grupo y hora respectiva de la falta de asistencia del dia siguiente
Devuelve un array en formato JSON:
```
[
    {
        "nombre":"Nieves",
        "apellido":"Tejeda",
        "hora":"1",
        "dia":"Monday",
        "Grupo":"2DAM"    
    }
]
```

Servicio: [get-faltas-tomorrow.php](https://github.com/santiagoieshna/ProfAsist-Servicios-PHP/blob/main/get-faltas-tomorrow.php)

