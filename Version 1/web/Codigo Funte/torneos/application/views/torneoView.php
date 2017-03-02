<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Torneos</title>
        <link href = "<?= base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css"/>
        <script src = "<?= base_url() . 'assets/js/jquery.js' ?>"></script>
        <script>
            function insertTeam() {
                data = {
                    name: $('#name').val()
                };
                $.ajax({
                    url: '<?= base_url() ?>index.php/torneo/insertTeam',
                    data: data,
                    type: 'post',
                    success: function (message) {
                        alert(message);
                        location.reload();
                    }
                });
            }
        </script>       
        <script>
            function createTourn() {                
                alert("Torneo Creado");
                location.reload();                
            }
        </script>
    </head>
    <body>
        <div align="center" style="margin-top:10px" ><img src="<?= base_url() . 'assets/img/font.png'?>"  width="600" height="200" class="imgcenter"></div>
        <div class="row">           
            <div class="panel-body col-xs-6 col-sm-4 col-md-offset-1" style=" margin-top:100px;">
                <div class="row center-block">
                    <div>
                        <div class="form-group">
                            <input type="text" id="name" class="form-control " placeholder="Nombre de equipo">
                        </div>
                    </div>
                </div>
                <div class="row center-block">
                    <div>
                        <button type="button" value="sent" onclick="insertTeam()" class="btn btn-primary center-block">INGRESAR EQUIPOS</button>
                    </div>
                </div>
            </div>

            <div class="panel-body col-xs-6 col-sm-5 col-md-offset-1 " style=" margin-top:50px">
                <div class="row center-block">
                    <div class="row">
                        <h4 class=" col-xs-6 col-sm-5 col-md-1">#</h4>
                        <h4 class=" col-xs-6 col-sm-5 col-md-5 col-md-offset-2">Nombre de equipo</h4>
                    </div>
                    <div>
                        <div class="table-responsive" style="height: 200px !important; overflow: aunto;">
                            <table class="table table-striped table-hover" >
                                <tbody>
                                    <?php
                                    if (is_array($teams) || is_object($teams)) {
                                        foreach ($teams as $t) {
                                            ?>
                                            <tr>
                                                <td><?= $t->id_team; ?></td>
                                                <td><?= $t->name; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>                                        
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel-body col-xs-6 col-sm-12" style="margin-top:10px;">
                <div class=" panel-body col-md-12">
                    <button type="button" value="sent" onclick="createTourn()" class="btn btn-success btn-lg center-block" style="width:500px;">INICIAR TORNEO</button>
                </div>
            </div>
        </div>
        <div style="margin-top:60px;" class="row">
            <div class="row">
                <h4 class=" col-xs-6 col-sm-5 col-md-1 col-md-offset-3">#</h4>
                <h4 class=" col-xs-6 col-sm-5 col-md-1">Nombre de equipo</h4>
                <h4 class=" col-xs-6 col-sm-5 col-md-1 col-md-offset-1">Vs</h4>
                <h4 class=" col-xs-6 col-sm-5 col-md-1">#</h4>
                <h4 class=" col-xs-6 col-sm-5 col-md-1">Nombre de equipo</h4>
            </div>
            <div>                
                <div class="table-responsive col-md-offset-3" style="width: 800px !important; overflow: aunto;">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th class="col-xs-6 col-sm-5 col-md-2"></th>
                                <th class="col-xs-6 col-sm-5 col-md-4"></th>
                                <th class="col-xs-6 col-sm-5 col-md-2"></th>
                                <th class="col-xs-6 col-sm-5 col-md-2"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (is_array($tourn) || is_object($tourn)) {
                                for ($i = 0; $i < count($tourn); $i++) {
                                    ?>
                                    <tr>
                                        <td><?= $tourn[$i]->id_team; ?></td>
                                        <td><?= $tourn[$i]->name; ?></td>
                                        <td>Vs</td>
                                        <?php if (($i+1)< count($tourn)) { ?>
                                            <td><?= $tourn[$i + 1]->id_team; ?></td>
                                            <td><?= $tourn[$i + 1]->name; ?></td>                                        
                                        <?php } ?>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                            } else {
                                ?>
                                <tr><td></td><td></td><td></td></tr>
                                <tr><td></td><td></td><td></td></tr>
                                <tr><td></td><td></td><td></td></tr>
                                <tr><td></td><td></td><td></td></tr>                                
                            <?php } ?>                                                       
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </body>
</html>