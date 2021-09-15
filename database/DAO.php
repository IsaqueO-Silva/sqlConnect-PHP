<?php

class DAO {

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
    public function connect() {
        try {
            /* array usado no retorno da função */
            $result = [];

            /* Instânciando o objeto PDO */
            $conn = new PDO($this->getDriver().':host='.$this->getServer().';dbname='.$this->getDatabase(),$this->getUsuario(),$this->getSenha());
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* Retorno */
            $result['error']    = false;
            $result['message']  = 'Conectado com sucesso!';

            $this->setResult(json_encode($result));

            /* Fechando a conexão */
            $conn = null;
        }
        catch(PDOException $e) {
            /* Retorno */
            $result['error']    = true;
            $result['message']  = 'Erro ao inicializar a conexão, verifique as informações de conexão e tente novamente!';

            $this->setResult(json_encode($result));
        }
    }
}

?>