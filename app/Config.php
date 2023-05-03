<?php

namespace App;
use Illuminate\Support\Facades\Crypt;

class Config
{
    const APP_DEBUG                         = true;

    const PRIMARY_KEY                       = 'adm_id';
    const TABLE                             = 'admin';
    const PREFIXO                           = 'adm_';
    const NOME_SESSAO                       = 'adm';

    const TIMEZONE                          = 'America/Sao_Paulo';
    const LOCALE                            = 'pt-BR';

    const APP_NAME                          = 'Candidato Vagas';
    const APP_URL                           = 'http://localhost';
    const DB_CONNECTION                     = 'mysql';
    const DB_HOST                           = '127.0.0.1';
    const DB_PORT                           = '3306';
    const DB_DATABASE                       = 'candidato-vagas';
    const DB_USERNAME                       = 'root';
    const DB_PASSWORD                       = null;
    const COLLATION                         = 'utf8mb4_unicode_ci';

}