-- Insertar un pedido
DELIMITER //
CREATE PROCEDURE sp_InsertarPedido(
    IN p_idusuario VARCHAR(50),
    IN p_foliopedido VARCHAR(50),
    IN p_cantidad INT,
    IN p_material VARCHAR(80),
    IN p_precio INT,
    IN p_medida VARCHAR(50)
)
BEGIN
    INSERT INTO pedidos (idusuario, foliopedido, cantidad, material, precio, medida) 
    VALUES (p_idusuario, p_foliopedido, p_cantidad, p_material, p_precio, p_medida);
END //
DELIMITER ;

-- Actualizar un pedido
DELIMITER //
CREATE PROCEDURE sp_ActualizarPedido(
    IN p_id INT,
    IN p_foliopedido VARCHAR(50),
    IN p_cantidad INT,
    IN p_material VARCHAR(80),
    IN p_precio INT,
    IN p_medida VARCHAR(50)
)
BEGIN
    UPDATE pedidos 
    SET foliopedido = p_foliopedido, cantidad = p_cantidad, material = p_material, 
        precio = p_precio, medida = p_medida
    WHERE id = p_id;
END //
DELIMITER ;

-- Eliminar un pedido
DELIMITER //
CREATE PROCEDURE sp_EliminarPedido(IN p_id INT)
BEGIN
    DELETE FROM pedidos WHERE id = p_id;
END //
DELIMITER ;

-- Consultar los pedidos de un usuario
DELIMITER //
CREATE PROCEDURE sp_ConsultarPedidos(IN p_idusuario VARCHAR(50))
BEGIN
    SELECT id, foliopedido, cantidad, material, precio, medida 
    FROM pedidos 
    WHERE idusuario = p_idusuario;
END //
DELIMITER ;
