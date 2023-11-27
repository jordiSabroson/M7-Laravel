# PRÀCTICA 1 - INICIAL
## SIGN IN + SIGN UP AMB LARAVEL
### ACTIVITAT

1. Crear les vistes i les seves rutes del sign in i sign up. Per això caldrà fer el següent:

* Crear les dues views corresponents (signin i signup).

* Crear les rutes (path) amb la següent nomenclatura a web.php.
  * /sign/signin
  * /sign/signup
* Crear el controlador (de nom SignController) que, segons la ruta renderitzarà la view corresponent.
Enllaç entre views.

2. Afegir paràmetres a signin i signup. Aquests paràmetres ens ajudaran a construir els títols de cada pàgina. 

* signin => Títol Iniciar sessió de l’usuari, son 4 paraules, per tant, de la ruta s’hauran d’enviar 4 paràmetres (iniciar, sessió, de i l’usuari).
* signup => Titol Creació d’usuari nou. son 3 paraules, per tant, de la ruta s’hauran d’enviar 3 paràmetres (creació, d’usuari i nou).