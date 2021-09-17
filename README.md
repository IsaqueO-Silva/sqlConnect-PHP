# sqlConnect-PHP
Aplicação web MVC usada para conexão com banco de dados MySQL, SQL.

PHP | PDO | JS | AJAX | JSON | MYSQL | BOOTSTRAP

![sqlConnect1](https://user-images.githubusercontent.com/46305573/132077653-73732f6e-a8dd-484b-a8f6-48cd2b2198a2.png)
![sqlConnect2](https://user-images.githubusercontent.com/46305573/133713015-14ef8366-1c36-4d51-bd71-6c997f874580.png)

--16/09/2021

Foi adicionada a opção de conexão a banco de dados SQL.

O servidor SQL de teste estava configurado na porta 1433.

Em caso de seu computador/servidor não ter algumas configurações habilitadas na instância SQL podem ocorrer erros por falta de permissões/porta.

Sendo assim tente as seguintes tratativas:

1 - Sql Server Configuration Manager > Configurações de Rede do SQL Server > Protocolos para o SQLEXPRESS >
TCP IP > Endereços IP > IPAll > Na opção porta TCP defina a mesma como 1433.

2 - Sql Server Configuration Manager > Configurações de Rede do SQL Server > Protocolos para o SQLEXPRESS >
Habilite os 3 serviços, Memória Compartilhada, Pipes Nomeados e TCP/IP.

3 - Reinicie o servidor(Microsoft SQL Server Management Studio).

4 - No firewall do windows crie uma regra de entrada para a porta 1433.

Estás tratativas foram feitas no Sql Server Configuration Manager 2019 e no MSSMS 18.
