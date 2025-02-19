<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulario de registro</title>

    <style>
      body {
        background-color:rgb(5, 219, 247);
        margin: 0;
        padding: 0;
      }
      h1 {
        text-align:center;
        width: 100%;
        margin: auto;
        margin-top: 100px;
      }
      table {
        border: 3px solidrgb(208, 137, 13);
        padding: 20px 50px;
        margin-top: 20px;
        border-radius: 5px;
        background-color:rgb(11, 233, 82);
      }
      .container {
        text-align: center;
        margin-top: 20px;
      }
      .image-container {
        text-align: center;
        margin-top: 20px;
      }
      .image-container img {
        width: 150px;
        height: auto;
        border-radius: 10px;
      }
      .caption {
        font-size: 14px;
        color: #333;
        margin-top: 5px;
      }
    </style>
  </head>
  <body>
    <h1>Formulario de Consulta</h1>
    <div class="image-container">
      <img src="logo.jpg" alt="Imagen logo" />
      <p class="caption">Imagen de uso libre o bajo licencia Creative Commons</p>
    </div>
    <form action="inserta_formulario.php" name="pedidos" method="POST">
      <table border="0" align="center">
        <tr>
          <td>
            IDUsuario:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="IDUsuario" id="name" required  />
          </td>
        </tr>
        <tr>
          <td>
            foliopedido:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="foliopedido" id="name" required  />
          </td>
        </tr>
        <tr>
          <td>
            Cantidad:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="cantidad" id="name"  required />
          </td>
        </tr>
        <td>
            material:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="material" id="name"  required />
          </td>
        </tr>
        <td>
            precio:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="precio" id="name"  required />
          </td>
        </tr>
        <td>
            medida:
          </td>
          <td>
            <label for="name"></label>
            <input type="text" name="medida" id="name"  required />
          </td>
        </tr>
       
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">
            <input
              type="submit"
              name="enviar"
              id="enviar"
              value="Registrarse"
            />
          </td>
          <td align="center">
            <input
              type="submit"
              name="enviar"
              id="enviar"
              value="Eliminar"
            />
          </td>
          
          <td align="center">
            <input type="reset" name="borrar" id="borrar" value="Editar" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
