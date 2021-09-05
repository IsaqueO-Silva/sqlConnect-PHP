/* Função utilizada na conexão com o banco de dados */
function conectarBancoDados() {
    let driver      = document.getElementById('driver').value;
    let server      = document.getElementById('server').value;
    let usuario     = document.getElementById('usuario').value;
    let senha       = document.getElementById('senha').value;
    let database    = document.getElementById('database').value;

    /* Objeto usado na requisição ajax */
    xmlHttp = new XMLHttpRequest();

    /* Tratando e capturando o retorno do servidor */
    xmlHttp.onreadystatechange = function() {
        if((this.readyState == 4) && (this.status == 200)) {
            /* Convertendo o JSON retornado em objeto(Object) */
            let result = JSON.parse(this.responseText);

            /* Mostrando a resposta do servidor - (result.error pode ser true | false) */
            document.getElementById('status').innerHTML = (result.error) ? '<div class="alert alert-danger" role="alert"><strong>'+result.message+'</strong></alert>' : '<div class="alert alert-success" role="alert"><strong>'+result.message+'</strong></alert>';
        }
    }

    xmlHttp.open('POST', 'Class/sqlConnect/sqlConnectController.php?status=conectaBancoDados&driver='+driver+'&server='+server+'&usuario='+usuario+'&senha='+senha+'&database='+database, true);

    xmlHttp.send();
}