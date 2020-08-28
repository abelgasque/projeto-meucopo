<html>
    <head>
        <title>Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h3 align="center">Clientes</h3><br/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="index.php/clientes/add" class="btn btn-info">Adicionar</a>
                </div>
                <div class="panel-body">
                    <span id="success_message"></span>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>             
                            <?php if(count($clientes)):?>
                                <?php 
                                    foreach($clientes as $cliente) { 
                                        echo '<tr>';
                                            echo '<td>'.$cliente->nome.'</td>';
                                            echo '<td>'.$cliente->email.'</td>';
                                            echo '<td>'.$cliente->telefone.'</td>';
                                            echo '<td>';
                                                echo '<a href="index.php/clientes/editar/'.$cliente->id.'" 
                                                class="btn btn-primary">Editar</a>';
                                                echo '<a href="index.php/clientes/deletar/'.$cliente->id.'" 
                                                class="btn btn-danger">Excluir</a>';
                                            
                                            echo'</td>';
                                        echo '</tr>';
                                    }  
                                ?>
                            <?php else:?>
                                <tr>
                                    <td>Sem dados para listar.</td>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>