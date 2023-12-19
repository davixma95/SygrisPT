-----------------------------------------------------
### Pregunta 1:  ---
-----------------------------------------------------

Teniendo en cuenta que tenemos una aplicación web privada que necesita de un usuario
y contraseña para poder trabajar con ella. Un día un cliente nos pide que le creemos
un sistema de Single Sign On para que sus usuarios puedan darse de alta en nuestra
aplicación con su cuenta corporativa. Pongamos que se te asigna a ti la tarea y además
queremos usar SAML para este propósito.

Describe brevemente cómo resolverías este caso y que datos crees que sería necesario
pedir al departamente técnico de este hipotetico cliente.

    -Ver necesidades del cliente
    (Entiendo que en este caso usuario, contraseña y creacion de token aunque en este caso lo da el propio servicio SSO)
    -Tendríamos que conocer también la plataforma en la que trabaja el cliente/Requerimientos del sistema
    -Pruebas de testing
    -Documentación para cliente y para personal en caso de que haya que modificar algo




### Fuentes 

https://www.chakray.com/es/que-es-el-single-sign-on-sso-definicion-caracteristicas-y-ventajas/

https://www.seidor.com/blog/saml-que-es

-----------------------------------------------------
### Pregunta 2:  ---
-----------------------------------------------------

Teniendo una aplicación de gestión de datos un día se nos plantea que tenemos
que crear una página pública, llamemosla public.domain.com, dónde mostrar parte
de esos datos, los cuales son privados y pertenecen a una empresa, algunos de
ellos son sensibles por lo que deben ser tratados con cuidado. Para complicarnos
un poco la vida nos piden que además las personas puedan darse de alta en esta
página pública validando sus credenciales contra nuestra app de gestión y con
ello se les permite a los usuarios con cuenta (cuenta con permisos muy restringidos)
realizar un par de acciones que resultan en la modificación / añadido de algunos
datos

Ten en cuenta que nuestra app de gestión tiene un sistema de login de usuarios
para usar la api. La página pública es serverless, estática y está alojada en
otro dominio diferente. Adicionalmente hemos de tener en cuenta que nuestra api
no está preparada para trabajar con otros dominios

Plantea una solución a este problema y comenta brevemente que cambios crees que
deberíamos hacer en nuestra aplicación de gestión, si crees que debemos hacer
alguno


    -Primero sería crear una API en la aplicación y si hay que mostrar algo que sean los datos menos "relevantes"
    -Podriamos usar SSO ya que es un modo de autenticación seguro.
    -Por base de datos se le pueden aplicar ciertos permisos a los que se loguean desde la web por eso de restringir información
    y que no puedan entrar a la API o a realizar ciertas actividades.
    -Endpoints seguros
    -Encriptacion de datos
    -Monitorizar las actividades de los clientes dentro de la propia aplicación
    -Documentación




### Fuentes

    ChatGPT - Bard

    https://www.youtube.com/watch?v=usajPd4YMZs&ab_channel=ManuelZapata

    https://latam.kaspersky.com/resource-center/definitions/encryption

    https://blog.hubspot.es/website/que-es-sso

