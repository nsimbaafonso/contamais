<?php

require_once "config/app.php";
require_once "config/errors.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Páginas disponíveis
$routes = [
    'home' => [
        'file' => 'home.php',
        'title' => 'Início',
        'description' => 'A ContaMais oferece serviços de contabilidade e consultoria financeira.'
    ],
    'sobre' => [
        'file' => 'about.php',
        'title' => 'Sobre nós',
        'description' => 'Conheça a ContaMais, a nossa empresa, missão, visão e valores.',
        'banner' => 'Sobre nós',
        'banner_text' => 'Conheça a nossa história, os nossos valores e o compromisso com o sucesso dos nossos clientes.',
        'banner_image' => 'sobre.jpg'
    ],
    'servicos' => [
        'file' => 'services.php',
        'title' => 'Serviços',
        'description' => 'Conheça os serviços de contabilidade e consultoria financeira da ContaMais.',
        'banner' => 'Nossos Serviços',
        'banner_text' => 'Soluções contabilísticas e financeiras para apoiar a gestão e o crescimento do seu negócio.',
        'banner_image' => 'servicos.jpg'
    ],
    'contactos' => [
        'file' => 'contacts.php',
        'title' => 'Contactos',
        'description' => 'Entre em contacto com a ContaMais. Estamos disponíveis para esclarecer as suas dúvidas.',
        'banner' => 'Fale connosco',
        'banner_text' => 'Estamos disponíveis para ajudar. Entre em contacto connosco e conheça as nossas soluções.',
        'banner_image' => 'contato.jpg'
    ],
];

// Identificar a página solicitada
$page = $_GET['page'] ?? 'home';

// Verificar se a página existe
if (!isset($routes[$page])) {
    http_response_code(404);
    require_once "errors/404.php";
    exit;
}

// Definir informações da página
$page_title = $routes[$page]['title'];
$page_description = $routes[$page]['description'];

$banner_title = $routes[$page]['banner'] ?? '';
$banner_text = $routes[$page]['banner_text'] ?? '';
$banner_image = $routes[$page]['banner_image'] ?? '';

// Carregar estrutura
include "includes/header.php";
include "includes/navbar.php";

include "pages/" . $routes[$page]['file'];

include "includes/footer.php";