# PRÀCTICA 2 - SIGNIN
## SIGN IN + SIGN UP AMB LARAVEL
### Afegir les següents funcionalitats al codi de la pràctica 1.

**1. Crear tres vistes:**
    1. professor: Mostrarà “Benvingut professor. El teu email és “. $email.
    2. alumne: Mostrarà “Benvingut alumne. El teu email és “. $email”.
    3. centre: Mostrarà “Benvingut administrador.El teu email és “. $email”.
on $email és una variable que vindrà del controlador.

**2. Crear dos rutes del tipus:**
* POST 
    * **Uri:** /login
    * **Desc:** haurà de rebre per paràmetres del POST dos valors: email i password de l’usuari. (Recordeu que es fa amb l’objecte request.)
    * **Lògica de la ruta:**
Haureu d’inventar-vos una lògica amb arrays per saber si l’email que ens arriba correspon a un professor, alumne o administrador:
        * Si és professor mostrarà la vista de professor tal i com s’indica en el punt 1. Haurà de mostrar el valor d’email.
        * Si és alumne, mostrarà si la vista alumne tal i com s’indica en el punt 1. Haurà de mostrar el valor d’email.
        * Si és admin, mostrarà la vista centre tal i com s’indica en el punt 1. Haurà de mostrar el valor d’email.

* GET 
    * **uri:**/error
    * **name:** errorAcces.index
    * **return:** Ha de mostrar per pantalla “Error d’accés”.

**3. Crear un middleware:**

Ha de controlar la ruta del POST:

* Si el mail i el password estan informats, continuarà amb la petició.
* En cas contrari, redireccionarà amb el to_route a la ruta de l’error a través del name.

**4. Condicions:**
1. Les rutes han d’estar en un nou controlador LoginController.
2. Les vistes s’han d’agrupar dins d’una carpeta.
3. Heu d’utilitzar el postman o eines similars per fer proves de la petició del POST.
