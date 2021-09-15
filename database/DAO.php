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
    public function connect() {
        try {
            /* array usado no retorno da função */
            $result = [];

            /* Instânciando o objeto PDO */
            $conn = new PDO($this->get_driver().':host='.$this->get_server().';dbname='.$this->get_database(),$this->get_usuario(),$this->get_senha());
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /* Retorno */
            $result['error']    = false;
            $result['message']  = 'Conectado com sucesso!';

            $this->set_result(json_encode($result));

            /* Fechando a conexão */
            $conn = null;
        }
        catch(PDOException $e) {
            /* Retorno */
            $result['error']    = true;
            $result['message']  = 'Erro ao inicializar a conexão. Por favor contate o suporte técnico!';

            $this->set_result(json_encode($result));
        }
    }
}

?>