<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/crudEnt.css">
    <title>Document</title>
</head>
<body>
    <?php include('php/navAdmin.php') ?>
    <h2>Entrenador</h2>
    <div class="container-fluid">
    
    <!---<div class="main col-md-4">
        
        
        <form action="">
                <div class="row">
                    <div class="form-group col">
                        <label for="">Tipo Documento</label>
                        <select name="" class="form-control" id="">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="">Número identificación</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                    <div class="row">
                    <div class="form-group col">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="fechanac">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="row">
                    <div class="form-group col">
                        <label for="">Barrio</label>
                        <select name="barrio" class="form-control" id=""></select>
                    </div>
        
                    <div class="form-group col">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="">Deporte</label>
                        <select name="deporte" class="form-control" id="deporte">
                            <option value="">baloncesto</option>
                            <option value="">natacion</option>
                            <option value="">futbol</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">Registrar</button>
        </form>
    </div>-->
    <div class="container">
    <div class="side col-md-8">
        <table class="table table-sm">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">E-mail</th>
                <th scope="col">Deporte</th>
                <th scope="col">Barrio</th>
                <th scope="col">Dirección</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/getData.js"></script>
</body>
</html>