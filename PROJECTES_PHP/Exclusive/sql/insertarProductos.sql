-- Belleza
INSERT INTO Producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod)
VALUES 
('BEL001', 'Base', 'Base líquida para maquillaje', 'img/Belleza/base.avif', 12.50, 100, 'Belleza'),
('BEL002', 'Eye Liner', 'Delineador para ojos negro', 'img/Belleza/eye_liner.jpg', 8.90, 150, 'Belleza'),
('BEL003', 'Gloss', 'Brillo labial', 'img/Belleza/gloss.jpeg', 5.75, 200, 'Belleza'),
('BEL004', 'Pintalabios', 'Labial color rojo pasión', 'img/Belleza/pintalabios.jpg', 10.00, 120, 'Belleza'),
('BEL005', 'Rimel', 'Máscara para pestañas', 'img/Belleza/rimel.jpeg', 9.99, 80, 'Belleza');

-- Cabello
INSERT INTO Producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod)
VALUES 
('CAB001', 'Acondicionador', 'Acondicionador hidratante', 'img/Cabello/acondicionador.jpg', 7.50, 90, 'Cabello'),
('CAB002', 'Champú', 'Champú reparador', 'img/Cabello/champu.png', 6.80, 120, 'Cabello'),
('CAB003', 'Gomina', 'Gel fijador para cabello', 'img/Cabello/gomina.jpg', 5.20, 150, 'Cabello'),
('CAB004', 'Laca', 'Laca para fijación extra fuerte', 'img/Cabello/laca.jpg', 8.25, 100, 'Cabello'),
('CAB005', 'Serum', 'Sérum para puntas abiertas', 'img/Cabello/serum1.jpg', 15.90, 60, 'Cabello');

-- Fragancias
INSERT INTO Producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod)
VALUES 
('FRA001', 'Axe', 'Fragancia Axe', 'img/Fragancias/axe.webp', 4.99, 300, 'Fragancia'),
('FRA002', 'Rexona', 'Desodorante Rexona', 'img/Fragancias/rexona.jpg', 3.75, 200, 'Fragancia'),
('FRA003', 'Rosas', 'Perfume aroma a rosas', 'img/Fragancias/rosas.jpg', 25.00, 50, 'Fragancia'),
('FRA004', 'Tulipán Negro', 'Desodorante Tulipán Negro', 'img/Fragancias/tulipan_negro.webp', 4.50, 250, 'Fragancia'),
('FRA005', 'Vainilla', 'Fragancia dulce de vainilla', 'img/Fragancias/vainilla.jpg', 20.00, 80, 'Fragancia');

-- Herramientas
INSERT INTO Producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod)
VALUES 
('HER001', 'Cepillo', 'Cepillo para el cabello', 'img/Herramientas/cepillo1.jpg', 5.00, 200, 'Herramientas'),
('HER002', 'Pinzas', 'Pack de pinzas', 'img/Herramientas/pinzas1.jpg', 3.50, 180, 'Herramientas'),
('HER003', 'Plancha', 'Plancha alisadora', 'img/Herramientas/plancha1.jpg', 35.99, 40, 'Herramientas'),
('HER004', 'Secador', 'Secador de cabello profesional', 'img/Herramientas/secador1.jpg', 45.00, 25, 'Herramientas'),
('HER005', 'Tijeras', 'Tijeras para cortar cabello', 'img/Herramientas/tijeras1.jpg', 10.50, 150, 'Herramientas');

-- Piel
INSERT INTO Producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod)
VALUES 
('PIE001', 'Aloe Vera', 'Gel hidratante de aloe vera', 'img/Piel/aloe_vera.jpg', 6.00, 120, 'Piel'),
('PIE002', 'Contorno de Ojos', 'Crema para contorno de ojos', 'img/Piel/contorno_ojos.avif', 15.00, 70, 'Piel'),
('PIE003', 'Nivea Men', 'Crema hidratante Nivea para hombres', 'img/Piel/nivea_men.jpg', 8.50, 90, 'Piel'),
('PIE004', 'Nivea Women', 'Crema hidratante Nivea para mujeres', 'img/Piel/nivea_women.jpg', 9.00, 100, 'Piel'),
('PIE005', 'Serum Facial', 'Sérum anti-edad para la piel', 'img/Piel/serum_facial.avif', 25.00, 50, 'Piel');
