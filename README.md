# Proyecto implementación JAVASCRIPT 

## Implementaciones

- Local storage en el QR
- Añadir comentarios y verlos
- Notie JS en los comentarios y puntos
- Sistema de puntos por compra
- Método para añadir propinas

## QR y Local Storage

En este código he tenido problemas a la hora de recuperar el pedido con el axios ya que era el primero que hacia en el proyecto y no sabia muy bien como utilizarlo, uno de los principales problemas que tuve fue recuperar el pedido porque los tengo guardados en formato JSON.

![Nombre descriptivo de la imagen](readmeimg/Pasted%20image%2020240217170923.png)

Aqui se usa el LOCAL STORAGE porque el pedido los recupero por la cookie de ultimo pedido por lo que este solo duraria lo que dura la cookie. Para evitar esto he creado el localStorage para guardar el contenido del QR y poder acceder.

![Descripción de la primera imagen](readmeimg/Pasted%20image%2020240217170944.png)

Ejemplo:

![Descripción de la segunda imagen](readmeimg/Pasted%20image%2020240217165128.png)

## Comentarios

Para los comentarios he usado dos axios uno get y otro post para poder añadir y eliminar comentarios.

Los filtros utilizados se realizan todo dentro del javascript filtrando en el array de los resultados de la API.

Aquí las dos funciones creadas en php que funcionan como una API

Envía información al JS:

![Descripción de la tercera imagen](readmeimg/Pasted%20image%2020240217170150.png)
Recibe informacion al PHP
![Descripción de la cuarta imagen](readmeimg/Pasted%20image%2020240217170339.png)
Las mayores dificultades que he tenido en los comentarios son que los dos filtros puedan ejecutarse simultáneamente sin que se sobrepongan. Para ello siempre primero elimino los comentarios que no estén filtrados del array y después los ordeno, de esta manera nunca falla.

Aquí se puede ver:
- shoulShowComent es para saber que comentarios se filtran (se eliminan) para mostrar todos los demas
![Descripción de la quinta imagen](readmeimg/Pasted%20image%2020240217170610.png)
- Después aquí los ordenamos:
![Descripción de la sexta imagen](readmeimg/Pasted image 20240217170824.png)

## NOTIEJS

El notiejs no ha sido ningún problema para aplicarlo de forma técnica.

Este lo uso en el comentario y puntos para dar feedback al usuario.

Ejemplo:

![Descripción de la séptima imagen](readmeimg/Pasted%20image%2020240217171103.png)

## SISTEMA DE PUNTOS

Para el sistema de puntos se utiliza una que cada 5€ gastados son 0,5€ en puntos.

Este es uno de los puntos mas complicados del proyecto ya que hay que añadir puntos, eliminar, aplicar descuentos teniendo en cuenta la propina, evitar negativos, etc.

Por lo que hay bastante código que se utiliza simplemente para evitar que haya pedidos que salgan gratis o por cantidades exageradas.

![Descripción de la octava imagen](readmeimg/Pasted%20image%2020240217172601.png)

Un ejemplo de código realizado puede ser el calculo de los puntos:

En este código se evita que se seleccionen puntos inválidos y también cambia la variable descuento y puntosSelInt que se usan mas adelante para poder calcular el precio total final

![Descripción de la novena imagen](readmeimg/Pasted%20image%2020240217172706.png)



## PROPINAS

Las propinas las he realizado sumando aplicándolas por un lado en JS y en PHP también para que no haya inyección de código. 

![Descripción de la décima imagen](readmeimg/Pasted%20image%2020240217171701.png)

Para recogerla se utiliza un addEventListener cuando haga la acción 'change' 
![Descripción de la undécima imagen](readmeimg/Pasted%20image%2020240217172046.png)
