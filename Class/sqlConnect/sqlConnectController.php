<?php

require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

class SqlConnectController {

    private $driver;
    private $server;
    private $usuario;
    private $senha;
    private $database;
    private $result;

    #region
    public function __construct($args) {
        $this->driver   = strtolower($args['driver']);
        $this->server   = $args['server'];
        $this->usuario  = $args['usuario'];
        $this->senha    = $args['senha'];
        $this->database = $args['database'];
    }

    public function setDriver($driver) {
        $this->driver = $driver;
    }

    public function getDriver() {
        return $this->driver;
    }

    public function setServer($server) {
        $this->server = $server;
    }

    public function getServer() {
        return $this->server;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function getDatabase() {
        return $this->database;
    }

    public function setResult($result) {
        $this->result = $result;
    }

    public function getResult() {
        return $this->result;
    }
    #endregion

    /* Função utilizada na conexão com o banco de dados */
    public function conectaBancoDadosController() {

        /* Instânciando o objeto Model */
        $sqlConnectModel = new SqlConnectModel([
            'driver'    => $this->getDriver(),
            'server'    => $this->getServer(),
            'usuario'   => $this->getUsuario(),
            'senha'     => $this->getSenha(),
            'database'  => $this->getDatabase()
        ]);

        $sqlConnectModel->conectaBancoDadosModel();

        /* Capturando o retorno do Model */
        $this->setResult($sqlConnectModel->getResult());

        /* Retorno do Controller */
        echo $this->getResult();
    }
}

/* Definindo qual método da classe deve ser chamado */
if(isset($_REQUEST['status'])) {

    switch(trim($_REQUEST['status'])) {

        case 'conectaBancoDados' :
            $sqlConnectController = new SqlConnectController([
                'driver'    => Utilitarios::sanitizar($_REQUEST['driver']),
                'server'    => Utilitarios::sanitizar($_REQUEST['server']),
                'usuario'   => Utilitarios::sanitizar($_REQUEST['usuario']),
                'senha'     => Utilitarios::sanitizar($_REQUEST['senha']),
                'database'  => Utilitarios::sanitizar($_REQUEST['database'])
            ]);

            $sqlConnectController->conectaBancoDadosController();
        break;
    }
}
?>