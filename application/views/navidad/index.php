<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro Navideño</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("libreria/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("libreria/css/bootstrap-theme.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("libreria/css/micss.css"); ?>" />
    <script>
      function borrar() {
        return confirm("¿Esta seguro?");
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h3>Registro Navideño</h3>
        <div class="col-md-6">
          <form method="post" action="<?php echo base_url("navidad/guardar"); ?>">
            <div class="form-group input-group">
              <span class="input-group-addon">Código</span>
              <input readonly class="form-control" type="text" name="id" value="<?php echo isset($edit->id)?$edit->id:''; ?>" />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Nombre</span>
              <input class="form-control" type="text" name="nombre"  value="<?php echo isset($edit->nombre)?$edit->nombre:''; ?>"  />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Descripción</span>
              <input class="form-control" type="text" name="descripcion" value="<?php echo isset($edit->descripcion)?$edit->descripcion:''; ?>"  />
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon">Precio</span>
              <input class="form-control" type="text" name="precio" value="<?php echo isset($edit->precio)?$edit->precio:''; ?>"  />
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?php echo base_url("navidad"); ?>" class="btn btn-info">Nuevo</a>
          </form>
        </div>
      </div>
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nobre</th>
              <th>Descripcion</th>
              <th>Operaciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($registro as $r) {
                $edit = base_url("navidad/navidad/?id={$r->id}");
                $del = base_url("navidad/borrar/?id={$r->id}");
                echo "<tr>";
                foreach ($r as $campo) {
                  echo "<td>{$campo}</td>";
                }
                echo "<td>
                <a href='{$edit}' class='btn btn-warning'>Editar</a>
                <a href='{$del}' class='btn btn-danger' onclick='return borrar();'>Eliminar</a>
                </td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
