# TrabajoTarjeta2019

[![CircleCI](https://circleci.com/gh/amadeomendez/TrabajoTarjeta2019.svg?style=svg)](https://circleci.com/gh/amadeomendez/TrabajoTarjeta2019)

## Cambios propuestos por Nam:

### General

- Actualizar el valor del boleto.
- Modificar la lógica del trasbordo para que sea gratuito según lo estipulado por la Municipalidad:
```
Desde el momento en que se cancela el primer viaje, se puede trasbordar a otras líneas urbanas en los tiempos estipulados para este servicio:
° Días hábiles: de 6 a 22 hs con un tiempo máximo de 60 minutos para trasbordar y de 22 a 6 hs con un tiempo máximo de 120 minutos para trasbordar.
° Sábados y medios festivos: de 6 a 14 hs con un tempo máximo de 60 minutos para trasbordar y de 14 a 00 hs con un tiempo máximo de 120 minutos para trasbordar.
° Domingos y festivos: todo el día con un tiempo máximo de 120 minutos para trasbordar.
```
- Añadir una clase de "Punto de Recarga", modificar el resto de las clases e interfaces para acomodar al comportamiento propuesto: cargar la tarjeta y extraer la responsabilidad de la tarjeta.

### Clase "Tarjeta"
- Retirar la responsabilidad de la hora y el precio del boleto (Ambas deberían ser parte del Colectivo, no de la tarjeta)
- Mover el método de recarga de saldo fuera de la clase/interface Tarjeta, a una clase/interface distinta (Punto de Regarga)
