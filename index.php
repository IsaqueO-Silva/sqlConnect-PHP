<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>SQL Connect</title>
  </head>
  <body>
    <section>
        <div class="container">
            <!--Form begin-->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="card mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="card-header bg-primary text-white fw-bold">
                                    CONECTAR-SE AO BANCO DE DADOS
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="row-12 row-sm-12 row-md-12">
                                            <form>
                                                <div class="row">
                                                    <div class="row-12 row-sm-12 row-md-12">
                                                        <div class="mb-3">
                                                            <label for="driver" class="form-label">Driver</label>
                                                            <select class="form-select" id="driver" name="driver" required>
                                                                <option value="MySQL">MySQL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="row-12 row-sm-12 row-md-12">
                                                        <div class="mb-3">
                                                            <label for="server" class="form-label">Servidor</label>
                                                            <input type="text" class="form-control" id="server" name="server" placeholder="127.0.0.1" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="row-12 row-sm-12 row-md-12">
                                                        <div class="mb-3">
                                                            <label for="usuario" class="form-label">Usuário</label>
                                                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="row-12 row-sm-12 row-md-12">
                                                        <div class="mb-3">
                                                            <label for="senha" class="form-label">Senha</label>
                                                            <input type="password" class="form-control" id="senha" name="senha" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="row-12 row-sm-12 row-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="database">Banco de Dados</label>
                                                            <input class="form-control" type="text" id="database" name="database" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="row-12 row-sm-12 row-md-12">
                                                        <div class="mb-3">
                                                            <button type="button" class="btn btn-primary" onclick="conectarBancoDados();">Conectar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12">
                                                        <label class="form-label" id="status"></label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Form end-->
        </div>
    </section>

    <!--Scripts-->
    <script src="assets/js/sqlConnect.js"></script>
    <!--/Scripts-->
  </body>
</html>