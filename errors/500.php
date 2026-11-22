
<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Erro interno do servidor | ContaMais</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?= filemtime('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= filemtime('assets/css/style.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.css" integrity="sha512-x9WwyMYBnlXMNQ6kQ/Lyzu1NqIhLQKL5Oq6xByfXuRj7s9CskyCbLv/1IjqzJmXwFXWr0ov6jBV7Qbc0hh9nHg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>

    <main class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 600px;">

                <div class="text-success mb-3">
                    <i class="fa-solid fa-triangle-exclamation" style="font-size: 70px;"></i>
                </div>

                <h1 class="display-1 fw-bold text-success mb-0">
                    500
                </h1>

                <h2 class="fw-bold mb-3">
                    Erro interno do servidor
                </h2>

                <p class="text-secondary lh-lg mb-4">
                    Ocorreu um problema ao processar o seu pedido.
                    Estamos a trabalhar para resolver a situação.
                    Por favor, tente novamente mais tarde.
                </p>

                <a href="/" class="btn btn-success px-4 py-3">
                    <i class="fa-solid fa-arrow-left me-2"></i>
                    Voltar ao início
                </a>

            </div>
        </div>
    </main>

    <script src="/assets/js/bootstrap.bundle.min.js?v=<?= filemtime('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
