-----------------------------------------------------
### Pregunta 1:  ---
-----------------------------------------------------
Dada la siguiente tabla:

```sql
CREATE TABLE `IMPUTACION` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Codigo_empleado` bigint(20) unsigned DEFAULT NULL,
  `Actividad` bigint(20) unsigned DEFAULT,
  `Horas` decimal(50,14) DEFAULT NULL,
  `Shared_id` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Codigo_empleado_index` (`Codigo_empleado`),
  KEY `Actividad_index` (`Actividad`),
  KEY `Shared_id_index` (`Shared_id`),
  KEY `Emp_act_index` (`Codigo_empleado`, `Actividad`),
  KEY `Emp_act_qc_index` (`Codigo_empleado`, `Actividad`, `Quincena`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

En el hipotetico caso de tener una aplicación que trata datos relativos a empleados.
Teniendo en cuenta lo siguiente:

- La app se integra con otra app externa que gestiona la imputación de horas de
esos empleados.
- A traves de una api recive los datos de las imputaciones de los empleados.
- La tabla de imputación contiene los datos de las horas que han invertido los
empleados en las distintas actividades / proyectos / tareas de la empresa.
- A traves de la api llegan importaciones masivas de datos, tanto añadidos como
actualizaciones, y los sistemas no comparten los mismos IDs (para la tabla de 
imputaciones) por lo que cuando se diseñó la integración se decidió usar un código
generado de hasta 128 caracteres que es único y corresponde al empleado, fecha y
actividad. **Este campo sería Shared_id en la tabla anteriormente descrita.**
- Cuando se reciben datos se buscan los Shared_id y los registros que ya existen
son actualizados mientras que el resto son añadidos.

Teniendo esto en mente, un día se descubre que hay un error en el código que se
encarga de la inserción / actualización de datos. Este error está provocando que
haya registros duplicados con el mismo Shared_id en la tabla de imputación,
incluso algunos casos en los que el número de horas no coincide. El error es
subsanado a nivel código pero ahora tenemos que limpiar la tabla de imputación.
Para ello es necesario tener en cuenta que debemos borrar los duplicados dejando
solo el último registro, el cual se supone que contiene los datos válidos.

Diseña una consulta que borre solo los datos que son erroneos. Adicionalmente,
¿Crees que la tabla tiene algún error de diseño?. De ser así, ¿Cómo la mejorarías?

Select Shared_id COUNT(*) from `IMPUTACION` group by Shared_id HAVING COUNT(*) > 1



DELETE Shared_id from `IMPUTACION` inner join ( SELECT Shared_id,ID ROW_NUMBER() OVER (PARTITION BY `Shared_id` HAVING COUNT(*) > 1) ) where Shared_id > 1







### FUENTES



https://es.stackoverflow.com/questions/1790/c%C3%B3mo-puedo-quitar-las-filas-duplicadas


https://learn.microsoft.com/es-es/troubleshoot/sql/database-engine/development/remove-duplicate-rows-sql-server-tab






-----------------------------------------------------
### Pregunta 2: ---
----------------------------:-------------------------
Dada la siguiente consulta

```sql
SELECT
    distinct(`TABLE_B`.`field_4780`)  AS  `country`,
    `TABLE_A`.`field_4302`  AS `entity_name`,
    ( Round(Sum(`TABLE_C`.`field_3877`), 0) ) AS `amount`, 
    ( Round(Sum(`TABLE_C`.`field_3881`), 0) ) AS `budget_deviation_amount`,
    ( Round(Sum(`TABLE_C`.`field_3878`), 0) ) AS `budget_amount`,
	`TABLE_E`.`TEXT_FIELD_E` AS `Description`
FROM  `TABLE_C` 
    INNER JOIN `TABLE_F` ON `TABLE_C`.`field_3874` = `TABLE_F`.`id` 
    INNER JOIN `TABLE_D` ON `TABLE_C`.`field_3873` = `TABLE_D`.`id` 
    INNER JOIN `TABLE_E` ON `TABLE_F`.`id` = `TABLE_E`.`field_4024` 
    LEFT JOIN `TABLE_G` ON (
        `TABLE_E`.`field_4033` = `TABLE_G`.`id` AND
        `TABLE_E`.`field_4034` = `TABLE_G`.`field_4015` AND
        `TABLE_E`.`TEXT_FIELD_E` = `TABLE_G`.`TEXT_FIELD_G`
    )
    INNER JOIN `TABLE_H` ON `TABLE_D`.`id` = `TABLE_H`.`field_4785` 
    INNER JOIN `TABLE_A` ON `TABLE_D`.`id` = `TABLE_A`.`field_4052`
    INNER JOIN `TABLE_B` ON `TABLE_H`.`field_4786` = `TABLE_B`.`id` 
WHERE 
    (
        UPPER(`TABLE_A`.`field_4302`) = 'ENTITY' OR
        `TABLE_B`.`field_4302` like 'SECONDARY%'
    ) AND
    `TABLE_A`.`field_4307` = 1 
GROUP  BY
    `TABLE_E`.`field_4033`, 
	`TABLE_G`.`field_4019`
ORDER  BY `TABLE_A`.`field_4302` ASC 
LIMIT  1000;
```

Describe brevemente, como optimizarías la consulta, que cosas consideras que
deberían cambiarse y que indices añadirías a las tablas que intervienen en la
misma (si consideras que habría que añadir alguno).


Por lo observado en foros una manera de optimización sería por ejemplo variables claras y cortas, evitar usar en where el uso de funciones como la de UPPER.

También poner indices en los join múltiples para mejorar la eficiencia de la misma.



### FUENTES



https://www.sqlshack.com/es/tecnicas-de-optimizacion-de-consultas-en-sql-server-consejos-y-trucos-de-aplicacion/

https://codigofacilito.com/articulos/tips-rendimiento-sql

https://www.w3schools.com/sql/func_sqlserver_upper.asp