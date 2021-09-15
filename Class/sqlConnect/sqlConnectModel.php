<?php

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

    /* Função utilizada na conexão com o banco de dados. */
    public function conectaBancoDadosModel() {
        /* Array usado no retorno da função */
        $result = [];

        try {
            /* Campos obrigatórios */
            if(empty($this->getDriver()) || empty($this->getServer()) || empty($this->getUsuario()) || empty($this->getDatabase())) {
                /* Retorno */
                $result['error']    = true;
                $result['message']  = 'Por favor, preencha os seguintes campos, driver, servidor, usuário e banco de dados!';

                $this->setResult(json_encode($result));
            }
            else {
                /* Instânciando o objeto DAO */
                $dao = new DAO([
                    'driver'    => $this->getDriver(),
                    'server'    => $this->getServer(),
                    'usuario'   => $this->getUsuario(),
                    'senha'     => $this->getSenha(),
                    'database'  => $this->getDatabase()
                ]);

                /* Função da camada DAO responsável pela conexão com o bd */
                $dao->connect();

                /* Capturando o retorno do DAO */
                $this->setResult($dao->getResult());
            }
        }
        catch(Exception $e) {
            /* Retorno */
            $result['error']    = true;
            $result['message']  = 'Erro ao inicializar a conexão!';

            $this->setResult(json_encode($result));
        }
    }
}

?>