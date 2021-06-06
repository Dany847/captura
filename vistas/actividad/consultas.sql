#Nombre de Organismo y cantidad de miembros
SELECT o.nombre_organismo, 
    ( 
        SELECT COUNT(*) FROM miembro mie 
        WHERE o.id_organismo = mie.id_organismo
    ) AS integrantes 
    FROM organismo o 
    LEFT JOIN miembro m ON o.id_organismo = m.id_organismo 
    GROUP BY o.nombre_organismo


#informe sin limite de tiempo
SELECT 
    z.nombre_zona, ct.nombre_centro, o.nombre_organismo, a.nombre_actividad, 
    (
        SELECT COUNT(*) * (
            SELECT COUNT(*) FROM actividad
        ) FROM miembro mie 
        WHERE mie.id_organismo = o.id_organismo
    )AS programado,
    
    (
    	SELECT COUNT(*)
        FROM captura capt
        WHERE capt.url_cfacebook <> '' 
        AND capt.id_miembro = m.id_miembro
    ) AS realizado
    FROM captura c 
    LEFT JOIN miembro m ON c.id_miembro = m.id_miembro
    LEFT JOIN organismo o ON m.id_organismo = o.id_organismo
    LEFT JOIN centro_trabajo ct ON o.id_centro = ct.id_centro
    LEFT JOIN zona z ON ct.id_zona = z.id_zona
    RIGHT JOIN actividad a ON c.id_actividad = a.id_actividad
    GROUP BY o.nombre_organismo



SELECT org.nombre_organismo, a.nombre_actividad, 
COUNT(*) realizado 
    FROM captura c 
    LEFT JOIN miembro m ON c.id_miembro = m.id_miembro 
    LEFT JOIN organismo org ON m.id_organismo = org.id_organismo 
    RIGHT JOIN actividad a ON c.id_actividad = a.id_actividad 
    WHERE c.url_cfacebook <> '' 
    GROUP BY a.nombre_actividad, org.nombre_organismo

#Actividad y cantidad realizada
SELECT a.nombre_actividad, COUNT(a.id_actividad) 
FROM captura c
LEFT JOIN actividad a 
ON c.id_actividad = a.id_actividad
WHERE c.url_cfacebook <> ''
GROUP BY a.nombre_actividad


##Ahí ta
SELECT 
    z.nombre_zona, ct.nombre_centro, o.nombre_organismo, a.nombre_actividad, 
    (
        SELECT COUNT(*) * (
            SELECT COUNT(*) FROM actividad
        ) FROM miembro mie 
        WHERE mie.id_organismo = o.id_organismo
    )AS programado,
    
    COUNT(c.url_cfacebook) AS realizado_facebook,
    COUNT(c.url_ctwitter) AS realizado_twitter
    FROM captura c 
    LEFT JOIN miembro m ON c.id_miembro = m.id_miembro
    LEFT JOIN organismo o ON m.id_organismo = o.id_organismo
    LEFT JOIN centro_trabajo ct ON o.id_centro = ct.id_centro
    LEFT JOIN zona z ON ct.id_zona = z.id_zona
    RIGHT JOIN actividad a ON c.id_actividad = a.id_actividad
    GROUP BY o.nombre_organismo, a.nombre_actividad