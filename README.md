<img src="/public/img/geeks.png" style="width:900px;"/>

---

# <center>Base de datos sobre reseñas de libros </center>
Esta es la base de datos de mi proyecto final utilizando Laravel realizado en el curso de FullStack Developer de GeeksHubs academy con deploy realizado en: <br>
![Heroku](https://img.shields.io/badge/heroku-%23430098.svg?style=for-the-badge&logo=heroku&logoColor=white)

---
He creado una base de datos que unida a un fronted (al final añadiré el enlace) realizado en react/redux sirve como web de reseñas literarias. La base de datos consta de 4 tablas, users, books, reviews, roles, más una tabla intermedia por la relación muchos a muchos entre users y roles. 
---

> Para la creación esta base de datos se han utilizando las siguientes tecnologías:

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)  ![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white) ![JWT](https://img.shields.io/badge/JWT-black?style=for-the-badge&logo=JSON%20web%20tokens)

---

<center>![Diagrama](https://user-images.githubusercontent.com/102535865/189875041-9185cd1f-582c-40c3-8f44-8f206296a98c.png)</center>


---

>*  La base de datos sigue el esquema <b>MVC (Model-View-Controller).</b> 

>* Las contraseñas son encriptadas a través de <b>BCRYPTJS</b> y la base de datos usa el sistema <b>JSON Web Token</b>.

>* La base de datos incluye un CRUD completo de las tablas <b>USERS</b>, <b>GAMES</b>, <b>CHANNELS</b> and <b>MESSAGES</b> .</b>

---

## Listado de enpoints:

###### <center><span style="color:red"> USER</span></center> 

- <b>https://books-reviews-app-proyect.herokuapp.com/api/register</b>

>Crea un <b>nuevo usuario.</b> Al crear un nuevo usuario por defecto se crea el rol de user en la tabla intermedia <b>role_user</b>, con la excepción del primer usuario que se registra en la web, al que automáticamente se le asignan los roles de admin y super admin.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/login</b>

>Al iniciar sesión con cualquier usuario se crea un token único vinculado a ese usuario.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/logout</b>

>Al cerrar sesión se inhabilita el token vinculado al usuario.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/user/myProfile</b>

>Muestra los datos de perfil del usuario, se accede a través del token al perfil asociado a dicho token, de esta forma cada usuario únicamente puede ver su perfil.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/user/editMyProfile/{id}</b>

>Permite modificar uno o varios campos de nuestro perfil, accediendo a través de nuestro token y el ID de usuario asociado a dicho token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/user/getAllUsers</b>

>Permite a un usuario con privilegios de Admin ver todos los usuarios registrados.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/user/deleteUserById</b>

>Permite a un usuario borrar su perfil.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/user/newAdmin/{id}</b>

>Asigna el rol de admin al usuario indicado por id, requiere rol de super admin.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/user/adminRemove/{id}</b>

>Retira el rol de admin al usuario indicado por id, requiere rol de super admin.
---

###### <center><span style="color:red"> BOOKS</span></center> 

- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/createBook</b>

>Da de alta en la base de datos un nuevo libro, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/showAllBooks</b>

>Muestra todos los libros ordenados por título ascendente, no requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/searchBookByTitle/{title}</b>

>Muestra únicamente los libros que coincidan con el título que haya introducido un usuario específico, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/searchBookByAuthor/{author}</b>

>Muestra únicamente los libros que coincidan con el autor que haya introducido un usuario específico, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/searchBookBySeries/{series}</b>

>Muestra únicamente los libros que coincidan con la saga que haya introducido un usuario específico, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/searchBookByYear/{year}</b>

>Muestra únicamente los libros que coincidan con la fecha de publicación que haya introducido un usuario específico, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/editBookById/{id}</b>

>Indicando el <b>ID</b> del libro en la <b>URL</b> del endpoint, permite editar datos del libro al usuario que lo haya introducido,requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/book/deleteBook/{id}</b>

>Indicando el <b>ID</b> del libro en la <b>URL</b> del endpoint, permite borrar el libro únicamente a su creador,requiere token.
---

###### <center><span style="color:red"> ROLES</span></center> 

- <b>https://books-reviews-app-proyect.herokuapp.com/api/role/newRole</b>

>Crea un nuevo rol, únicamente puede hacerlo un super admin.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/role/deleteRole/{id}</b>

>Elimina un rol existente especificando su id, únicamente puede hacerlo un super admin.
---

###### <center><span style="color:red"> REVIEWS</span></center>

- <b>https://books-reviews-app-proyect.herokuapp.com/api/review/createReview</b>

> El usuario puede crear una reseña sobre el libro indicado, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/review/showAllReviews</b>

> Muestra todas las reseñas existentes de todos los títulos, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/review/searchReviewByUserName/{user_name}</b>

>Muestra todas las reseñas filtradas asociadas al nombre del usuario que le indiquemos, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/review/searchReviewByBookId/{id}</b>

>Muestra todas las reseñas asociadas al id del libro que le indiquemos, requiere token.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/review/editReviewById/{id}</b>

>Permite modificar uno o varios campos al usuario que ha creado la reseña indicada por su id.
---
- <b>https://books-reviews-app-proyect.herokuapp.com/api/review/deleteReview/{id}</b>

>Permite eliminar la reseña que le indiquemos con su id al usuario que la ha creado.
---

## 🌐 Socials:
[![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5.svg?logo=linkedin&logoColor=white)](https://www.linkedin.com/in/alejandrolaguia/) 

## Frontend asociado a esta base de datos

https://github.com/Alexdck/Books_reviews_proyect_react/tree/develop
