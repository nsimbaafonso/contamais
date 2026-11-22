<?php
error_reporting(E_ALL); //identifica todos os tipos de erros.

ini_set('display_errors', 1); //permite visualizar erros no navegador. 1: ativa, 0:desativa
ini_set('log_errors', 1); //ativa o registo de erros.
ini_set('error_log', __DIR__ . '/../errors/php_errors.log'); //define onde guardar os registos.

//Tratamento de exceções
set_exception_handler(function ($exception) {
    error_log($exception);

    http_response_code(500);

    require_once __DIR__ . '/../errors/500.php';

    exit;
});
