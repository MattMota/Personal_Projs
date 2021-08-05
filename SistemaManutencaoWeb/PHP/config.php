<?php
    
    $config = array (
        'APP_PREFIX' => '/Pagina',
        'DEFAULT_TIME_ZONE' => 'America/Sao_Paulo',
        'DB_HOST' => 'localhost',
        'DB_USER' => 'root',
        'DB_DATABASE' => 'chamados',
        'DB_PASSWORD' => '',
        'LOCATION' => 'Location: http://www.cefet-rj.br/'
    );

    function getConnection(){
        static $dbh = null;
        global $config;
        global $host, $user, $database, $pass;
 
        if($dbh == null){
            $host = $config["DB_HOST"];
            $user = $config["DB_USER"];
            $database = $config["DB_DATABASE"];
            $pass = $config["DB_PASSWORD"];

            try{
                $dbh = new PDO("mysql:host={$host};dbname={$database};charset=utf8",$user,$pass);
            }
            catch(PDOException $e){
                error_log("Falha na conexão com o banco {$database}. ");
                die();
            }
        }
        return $dbh;
    }

    function ScrDateFormat($str){
        
        if(strlen($str) == 10)
            $str = substr($str,8,2) . "/" . substr($str,5,2) . "/" . substr($str,0,4);
        else
            $str = "";

        return $str;
    }

    function absolutePath($relativePath)
    {
        global $config;
        static $prefix = null;
        if($prefix == null)
        {
            $scriptName = $_SERVER['SCRIPT_NAME'];
            $appPrefix = $config['APP_PREFIX'];
            $pos = strpos($scriptName,$appPrefix);
            if($pos >= 0)
            {
                $prefix = substr($scriptName,0,$pos) . $appPrefix . '/';
            }
            else
            {
                error_log("Erro na configuração da aplicação. Prefixo $appPrefix não é parte do nome do script $scriptName.");
                die();
            }
        }
        return $prefix . $relativePath;
    }

?>
