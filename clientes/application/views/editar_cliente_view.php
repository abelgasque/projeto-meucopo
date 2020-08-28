<html>
    <head>
        <title>Clientes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Editar cliente</h1>
            <ol class="breadcrumb">
                <li><a href="/clientes/">Home</a></li>
                <li><a style="color: black; text-decoration:none">Editar cliente</a></li>
            </ol>
            <div class="row">
                <form action="salvar" name="form_salvar" method="post">
                    <div class="row">
                        <div class="col-12">
                            <label>Nome</label>
                            <input type="text" name="nome" value="<?php echo $cliente->nome?>" 
                            class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>E-mail</label>
                            <input type="text" name="email" value="<?php echo $cliente->email?>" 
                            class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label>Telefone</label>
                            <input type="text" name="telefone" value="<?php echo $cliente->telefone?>" 
                            class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="<?php echo $cliente->id?>"> 
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>
</html>