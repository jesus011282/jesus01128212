<?php
session_start();
include 'conexion.php'; 

$idusuario = $_SESSION['usuario']['idusuarios'];

$pedidos = [];

if (isset($idusuario)) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=usuario", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        $stmt = $pdo->prepare("CALL sp_ConsultarPedidos(:idusuario)");
        $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_STR);
        $stmt->execute();
        $pedidos = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "<h3>Error de conexión: " . $e->getMessage() . "</h3>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- jQuery y DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
$(document).ready(function() {
    $('#tablaPedidos').DataTable();

    // Eliminar pedido
    $(document).on('click', '.btn-eliminar', function() {
        let idPedido = $(this).data('id');
        if (confirm("¿Seguro que deseas eliminar este pedido?")) {
            $.post("crud.php", { accion: "eliminar", id: idPedido }, function(response) {
                alert(response);
                location.reload();
            });
        }
    });

    // Evento onchange para editar en línea
    $(document).on('change', '.input-inline', function() {
        let field = $(this).data('field');
        let id = $(this).data('id');
        let value = $(this).val();

        // Enviar actualización mediante AJAX
        $.post("crud.php", { accion: "editarCampo", id: id, field: field, value: value }, function(response) {
            alert(response);
        });
    });

    // Agregar Pedido (si deseas mantener esta funcionalidad)
    $("#formPedido").submit(function(event) {
        event.preventDefault();
        $.post("crud.php", $(this).serialize(), function(response) {
            alert(response);
            location.reload();
        });
    });
});

    </script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Mis Pedidos</h2>

        <form id="formPedido" class="mb-3">
            <input type="hidden" name="accion" value="insertar">
            <input type="hidden" name="idusuario" value="<?= $idusuario ?>">
            <input type="text" name="foliopedido" class="form-control mb-2" placeholder="Folio" required>
            <input type="number" name="cantidad" class="form-control mb-2" placeholder="Cantidad" required>
            <input type="text" name="material" class="form-control mb-2" placeholder="Material" required>
            <input type="number" name="precio" class="form-control mb-2" placeholder="Precio" required>
            <input type="text" name="medida" class="form-control mb-2" placeholder="Medida" required>
            <button type="submit" class="btn btn-success">Agregar Pedido</button>
        </form>

        <table id="tablaPedidos" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Folio</th>
                    <th>Cantidad</th>
                    <th>Material</th>
                    <th>Precio</th>
                    <th>Medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= htmlspecialchars($pedido['id']) ?></td>
            <td>
                <input type="text" class="form-control input-inline" 
                       data-field="foliopedido" data-id="<?= $pedido['id'] ?>"
                       value="<?= htmlspecialchars($pedido['foliopedido']) ?>">
            </td>
            <td>
                <input type="number" class="form-control input-inline" 
                       data-field="cantidad" data-id="<?= $pedido['id'] ?>"
                       value="<?= htmlspecialchars($pedido['cantidad']) ?>">
            </td>
            <td>
                <input type="text" class="form-control input-inline" 
                       data-field="material" data-id="<?= $pedido['id'] ?>"
                       value="<?= htmlspecialchars($pedido['material']) ?>">
            </td>
            <td>
                <input type="number" step="0.01" class="form-control input-inline" 
                       data-field="precio" data-id="<?= $pedido['id'] ?>"
                       value="<?= htmlspecialchars($pedido['precio']) ?>">
            </td>
            <td>
                <input type="text" class="form-control input-inline" 
                       data-field="medida" data-id="<?= $pedido['id'] ?>"
                       value="<?= htmlspecialchars($pedido['medida']) ?>">
            </td>
            <td>
                <button class="btn btn-danger btn-sm btn-eliminar" data-id="<?= $pedido['id'] ?>">Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>