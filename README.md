<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Para correr el server

- ingresar a linea de comandos 
- ejecutar los siguientes comandos 
- php artisan migrate
- php artisan serve

## Endpoints del proyecto 

 ### Crear un usuario:
 - Protocolo: post
- Ruta: http://127.0.0.1:8000/api/auth/register 
- PayLoad:
  {
    "name": "Marcos Damas",
    "email": "marcosdamas12@gmail.com",
    "password": "123456789",
    "role": "administrator"
    } 
 - Debe de tener en los Header:
   aceept : aplication/json

 ### iniciar sesion usuario:
- Protocolo: post
- Ruta: http://127.0.0.1:8000/api/auth/login 
- PayLoad:
  {

    "email": "marcosdamas12@gmail.com",
    "password": "123456789",
    } 
 - Debe de tener en los Header:
   aceept : aplication/json



   
   

