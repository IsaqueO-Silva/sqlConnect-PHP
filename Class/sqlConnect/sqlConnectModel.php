<?php

require_once('../../database/DAO.php');

class SqlConnectModel {

    private $driver;
    private $server;
    private $usuario;
    private $senha;
    private $database;
    private $result;

    #region
    public function __construct($args) {
        $this->driver   = $args['driver'];
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

    /* Função utilizada na conexão com o banco de dados. */
    public function conectaBancoDadosModel() {
        /* Array usado no retorno da função */
        $result = [];

        try {
            /* Campos obrigatórios */
            if(empty($this->get_driver()) || empty($this->get_server()) || empty($this->get_usuario()) || empty($this->get_database())) {
                /* Retorno */
                $result['error']    = true;
                $result['message']  = 'Por favor, preencha os seguintes campos, driver, servidor, usuário e banco de dados!';

                $this->set_result(json_encode($result));
            }
            else {
                /* Instânciando o objeto DAO */
                $dao = new DAO([
                    'driver'    => $this->get_driver(),
                    'server'    => $this->get_server(),
                    'usuario'   => $this->get_usuario(),
                    'senha'     => $this->get_senha(),
                    'database'  => $this->get_database()
                ]);

                /* Função da camada DAO responsável pela conexão com o bd */
                $dao->connect();

                /* Capturando o retorno do DAO */
                $this->set_result($dao->get_result());
            }
        }
        catch(Exception $e) {
            /* Retorno */
            $result['error']    = true;
            $result['message']  = 'Erro ao inicializar a conexão!';

            $this->set_result(json_encode($result));
        }
    }
}

?>