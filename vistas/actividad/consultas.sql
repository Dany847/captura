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
    c.id_captura, a.nombre_actividad, 
    (
        SELECT COUNT(*) FROM miembro mie 
        WHERE mie.id_organismo = o.id_organismo
    )AS programado, 
    o.nombre_organismo, ct.nombre_centro, z.nombre_zona 
    FROM captura c 
    LEFT JOIN miembro m ON c.id_miembro = m.id_miembro
    LEFT JOIN organismo o ON m.id_organismo = o.id_organismo
    LEFT JOIN centro_trabajo ct ON o.id_centro = ct.id_centro
    LEFT JOIN zona z ON ct.id_zona = z.id_zona
    LEFT JOIN actividad a ON c.id_actividad = a.id_actividad
    GROUP BY o.nombre_organismo



SELECT org.nombre_organismo, COUNT(*) realizado FROM captura c 
LEFT JOIN miembro m ON c.id_miembro = m.id_miembro 
LEFT JOIN organismo org ON m.id_organismo = org.id_organismo 
LEFT JOIN actividad a ON c.id_actividad = a.id_actividad 
WHERE c.url_cfacebook <> '' 
GROUP BY org.nombre_organismo