<?php

require_once('../../assets/utilitarios/utilitarios.php');
require_once('sqlConnectModel.php');

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

    public function set_driver($driver) {
        $this->driver = $driver;
    }

    public function get_driver() {
        return $this->driver;
    }

    public function set_server($server) {
        $this->server = $server;
    }

    public function get_server() {
        return $this->server;
    }

    public function set_usuario($usuario) {
        $this->usuario = $usuario;
    }

    public function get_usuario() {
        return $this->usuario;
    }

    public function set_senha($senha) {
        $this->senha = $senha;
    }

    public function get_senha() {
        return $this->senha;
    }

    public function set_database($database) {
        $this->database = $database;
    }

    public function get_database() {
        return $this->database;
    }

    public function set_result($result) {
        $this->result = $result;
    }

    public function get_result() {
        return $this->result;
    }
    #endregion

    /* Função utilizada na conexão com o banco de dados */
    public function conectaBancoDadosController() {

        /* Instânciando o objeto Model */
        $sqlConnectModel = new SqlConnectModel([
            'driver'    => $this->get_driver(),
            'server'    => $this->get_server(),
            'usuario'   => $this->get_usuario(),
            'senha'     => $this->get_senha(),
            'database'  => $this->get_database()
        ]);

        $sqlConnectModel->conectaBancoDadosModel();

        /* Capturando o retorno do Model */
        $this->set_result($sqlConnectModel->get_result());

        /* Retorno do Controller */
        echo $this->get_result();
    }
}

/* Definindo qual método da classe deve ser chamado */
if(isset($_REQUEST['status'])) {

    switch(trim($_REQUEST['status'])) {

        case 'conectaBancoDados' :
            $sqlConnectController = new SqlConnectController([
                'driver'    => sanitizar($_REQUEST['driver']),
                'server'    => sanitizar($_REQUEST['server']),
                'usuario'   => sanitizar($_REQUEST['usuario']),
                'senha'     => sanitizar($_REQUEST['senha']),
                'database'  => sanitizar($_REQUEST['database'])
            ]);

            $sqlConnectController->conectaBancoDadosController();
        break;
    }
}
?>