<?php

    class Utilitarios {

        /* Função utilizada para limpar dados do formulário */
        public static function sanitizar($dado) {
            $dado = trim($dado);
            $dado = stripslashes($dado);
            $dado = htmlspecialchars($dado);

            return $dado;
        }
    }
?>