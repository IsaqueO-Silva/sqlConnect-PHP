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

            /* definindo a string de conexão a partir do driver */
            switch($this->getDriver()) {

                case 'mysql':
                    $conn = new PDO($this->getDriver().':host='.$this->getServer().';dbname='.$this->getDatabase(),$this->getUsuario(),$this->getSenha());
                break;

                case 'sqlsrv':
                    /* Está string de conexão está usando a porta 1433(porta padrão do sql) */
                    /* Em caso de erro na conexão com o sql tente as seguintes tratativas
                    1 - Sql Server Configuration Manager > Configurações de Rede do SQL Server > Protocolos para o SQLEXPRESS >
                    TCP IP > Endereços IP > IPAll > Na opção porta TCP defina a mesma como 1433
                    2 - Sql Server Configuration Manager > Configurações de Rede do SQL Server > Protocolos para o SQLEXPRESS >
                    Habilite os 3 serviços, Memória Compartilhada, Pipes Nomeados e TCP/IP
                    3 - Reinicie o servidor(Microsoft SQL Server Management Studio)
                    4 - No firewall do windows crie uma regra de entrada para a porta 1433 
                    Estás tratativas foram feitas no Sql Server Configuration Manager 2019 e no MSSMS 18 */
                    $conn = new PDO($this->getDriver().':Database='.$this->getDatabase().';server='.$this->getServer().',1433\SQLEXPRESS;ConnectionPooling=0',$this->getUsuario(),$this->getSenha());

                    /* Em caso de não haver uma porta definida para o sql use a string abaixo */
                    //$conn = new PDO($this->getDriver().':Database='.$this->getDatabase().';server='.$this->getServer().'\SQLEXPRESS;ConnectionPooling=0',$this->getUsuario(),$this->getSenha());
                break;
            }

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
            $result['error']        = true;
            $result['message']      = 'Erro ao inicializar a conexão, verifique as informações de conexão e tente novamente!';

            /* Status de erro do PDO
            obs: uma das mensagens de erro do mysql precisou ser encodada em utf8 */
            ($this->getDriver() == 'mysql') ? $result['pdoException'] = utf8_encode($e->getMessage()) : $result['pdoException'] = $e->getMessage();

            $this->setResult(json_encode($result));
        }
    }
}

?>