<img src="/public/img/geeks.png" style="width:900px;"/>

---

# <center>BBDD reseñas de libros </center>
Base de datos realizada en Laravel como proyecto final en el curso de FullStack Developer de GeeksHubs academy. Deploy realizado en: <br>
<center><div > Railway </div></center>
<center><img src="https://camo.githubusercontent.com/df61f4b2e2cc40922b5290ed53040485ab7167836872ce1aa88d88462e9816ce/68747470733a2f2f7261696c7761792e6170702f6272616e642f6c6f676f2d6c696768742e706e67" style="width:90px;"/></center>

---
He creado una base de datos que unida a un front-end realizado en react (al final añadiré el enlace), sirve como web de reseñas literarias. La base de datos consta de 4 tablas relacionales, users, books, reviews, roles, además de una tabla intermedia dada la relación muchos a muchos entre users y roles. 
---

> Para la creación de esta base de datos se han utilizando las siguientes tecnologías:

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)  ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white) ![JWT](https://img.shields.io/badge/JWT-black?style=for-the-badge&logo=JSON%20web%20tokens)

---

<center><img src="https://user-images.githubusercontent.com/102535865/189875041-9185cd1f-582c-40c3-8f44-8f206296a98c.png"/></center>


---

>*  La base de datos sigue el esquema <b>MVC (Model-View-Controller).</b> 

>* Las contraseñas son encriptadas a través de <b>BCRYPTJS</b> y la base de datos usa el sistema <b>JSON Web Token</b>.

>* La base de datos incluye un CRUD completo de las tablas <b>USERS</b>, <b>BOOKS</b> y <b>REVIEWS</b>.

---

## Listado de enpoints:

###### <center><span style="color:red"> USER</span></center> 

- <b>https://BookApi.up.railway.app/api/register</b>

>Crea un <b>nuevo usuario.</b>Al primer usuario que se registra en la web se le asignan automáticamente los roles de <b>"admin"</b> y <b>"super admin"</b>, a los siguientes registros se les asigna el rol de <b>"user"</b> automáticamente<b>role_user</b>. 
---
- <b>https://BookApi.up.railway.app/api/login</b>

>Al iniciar sesión con cualquier usuario se crea un token único vinculado a ese usuario.
---
- <b>https://BookApi.up.railway.app/api/logout</b>

>Cerrar sesión inhabilita el token vinculado al usuario.
---
- <b>https://BookApi.up.railway.app/api/user/myProfile</b>

>Muestra los datos de perfil del usuario asociado al token vinculado en ese momento.
---
- <b>https://BookApi.up.railway.app/api/user/editMyProfile/{id}</b>

>Permite modificar uno o varios campos de nuestro perfil, accediendo a través de nuestro token y el <b>ID</b> de usuario asociado a dicho token.
---
- <b>https://BookApi.up.railway.app/api/user/getAllUsers</b>

>Permite a un usuario con privilegios de <b>"admin"</b> ver todos los usuarios registrados en la aplicación.
---
- <b>https://BookApi.up.railway.app/api/user/deleteUserById</b>

>Permite a un usuario borrar su perfil.
---
- <b>https://BookApi.up.railway.app/api/user/newAdmin/{id}</b>

>Asigna el rol de admin al usuario indicado por <b>ID</b>, requiere rol de <b>"super admin"</b>.
---
- <b>https://BookApi.up.railway.app/api/user/adminRemove/{id}</b>

>Retira el rol de admin al usuario indicado por <b>ID</b>, requiere rol de <b>"super admin"</b>.
---

###### <center><span style="color:red"> BOOKS</span></center> 

- <b>https://BookApi.up.railway.app/api/book/createBook</b>

>Da de alta en la base de datos un nuevo libro, requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/showAllBooks</b>

>Muestra los libros existentes ordenados por <b>título ascendente</b>, no requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/searchBookByTitle/{title}</b>

>Muestra únicamente los libros que coincidan con el <b>título</b> que le indicamos en la URL, requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/searchBookByAuthor/{author}</b>

>Muestra únicamente los libros que coincidan con el <b>autor</b> que le indicamos en la URL, requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/searchBookBySeries/{series}</b>

>Muestra únicamente los libros que coincidan con la <b>saga</b> que le indicamos en la URL, requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/searchBookByYear/{year}</b>

>Muestra únicamente los libros que coincidan con la <b>fecha de publicación</b> que le indicamos en la URL, requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/editBookById/{id}</b>

>Indicando el <b>ID</b> del libro en la URL del endpoint, permite editar datos del libro al usuario que lo haya introducido,requiere token.
---
- <b>https://BookApi.up.railway.app/api/book/deleteBook/{id}</b>

>Indicando el <b>ID</b> del libro en la URL del endpoint, permite borrar el libro únicamente a su creador,requiere token.
---

###### <center><span style="color:red"> ROLES</span></center> 

- <b>https://BookApi.up.railway.app/api/role/newRole</b>

>Crea un nuevo rol, únicamente puede hacerlo un <b>"super admin"</b>.
---
- <b>https://BookApi.up.railway.app/api/role/deleteRole/{id}</b>

>Elimina un rol existente especificando su <b>ID</b>, únicamente puede hacerlo un <b>"super admin"</b>.
---

###### <center><span style="color:red"> REVIEWS</span></center>

- <b>https://BookApi.up.railway.app/api/review/createReview</b>

> El usuario puede crear una reseña sobre el libro indicado, requiere token.
---
- <b>https://BookApi.up.railway.app/api/review/showAllReviews</b>

> Muestra todas las reseñas existentes de todos los títulos, requiere token.
---
- <b>https://BookApi.up.railway.app/api/review/searchReviewByUserName/{user_name}</b>

>Muestra todas las reseñas filtradas asociadas al nombre del usuario que le indiquemos, requiere token.
---
- <b>https://BookApi.up.railway.app/api/review/searchReviewByBookId/{id}</b>

>Muestra todas las reseñas asociadas al <b>ID</b> del libro que le indiquemos, requiere token.
---
- <b>https://BookApi.up.railway.app/api/review/editReviewById/{id}</b>

>Permite modificar uno o varios campos al usuario que ha creado la reseña indicada por su <b>ID</b>
---
- <b>https://BookApi.up.railway.app/api/review/deleteReview/{id}</b>

>Permite eliminar la reseña que le indiquemos con su <b>ID</b> al usuario que la ha creado.
---

## 🌐 Socials:
[![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5.svg?logo=linkedin&logoColor=white)](https://www.linkedin.com/in/alejandrolaguia/) 

## Frontend asociado a esta base de datos

https://github.com/Alexdck/Books_reviews_proyect_react/tree/develop
