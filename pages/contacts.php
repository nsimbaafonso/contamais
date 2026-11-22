
<?php

$errors = [];
$success = false;

// Gerar token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$name = '';
$email = '';
$phone = '';
$subject = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validar token CSRF
    $csrf_token = $_POST['csrf_token'] ?? '';

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validar nome
    if (strlen($name) < 3) {
        $errors['name'] = 'Introduza o seu nome completo.';
    }

    // Validar e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Introduza um endereço de e-mail válido.';
    }

    // Validar telefone (opcional)
    if ($phone !== '' && !preg_match('/^[0-9+\s()-]{7,20}$/', $phone)) {
        $errors['phone'] = 'Introduza um número de telefone válido.';
    }

    // Validar assunto
    $allowed_subjects = [
        'Contabilidade Geral',
        'Consultoria Fiscal',
        'Gestão Financeira',
        'Processamento Salarial',
        'Constituição de Empresas',
        'Consultoria Empresarial',
        'Outro'
    ];

    if (!in_array($subject, $allowed_subjects, true)) {
        $errors['subject'] = 'Selecione um assunto válido.';
    }

    // Validar mensagem
    if (strlen($message) < 10) {
        $errors['message'] = 'A mensagem deve ter pelo menos 10 caracteres.';
    } elseif (strlen($message) > 5000) {
        $errors['message'] = 'A mensagem não pode ultrapassar 5000 caracteres.';
    }

    // Enviar e-mail
    if (empty($errors)) {

        require_once __DIR__ . '/../config/mail.php';
        require_once __DIR__ . '/../vendor/autoload.php';

        try {

            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = MAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASSWORD;
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = MAIL_PORT;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
            $mail->addAddress(MAIL_TO_ADDRESS);
            $mail->addReplyTo($email, $name);

            $mail->isHTML(true);
            $mail->Subject = 'Novo contacto: ' . $subject;

            $mail->Body = '
                <h2>Nova mensagem de contacto</h2>

                <p><strong>Nome:</strong> ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</p>

                <p><strong>E-mail:</strong> ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</p>

                <p><strong>Telefone:</strong> ' . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . '</p>

                <p><strong>Assunto:</strong> ' . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . '</p>

                <p><strong>Mensagem:</strong></p>

                <p>' . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . '</p>
            ';

            $mail->AltBody = "Nome: $name\n"
                . "E-mail: $email\n"
                . "Telefone: $phone\n"
                . "Assunto: $subject\n\n"
                . $message;

            $mail->send();

            $success = true;

            // Limpar os campos após o envio
            $name = '';
            $email = '';
            $phone = '';
            $subject = '';
            $message = '';

        } catch (\Throwable $e) {

            error_log('Erro no envio do formulário: ' . $e->getMessage());

            $errors['general'] = 'Não foi possível enviar a mensagem. Tente novamente mais tarde.';
        }
    }
}

?>

<?php include "includes/page-banner.php"; ?>


<!-- Informações de contacto -->
<section class="py-5">
    <div class="container py-4">

        <div class="text-center mb-5">
            <span class="text-success fw-semibold text-uppercase">
                Entre em contacto
            </span>

            <h2 class="fw-bold mt-2">Estamos aqui para ajudar</h2>

            <p class="text-secondary mx-auto" style="max-width: 600px;">
                Tem alguma dúvida ou precisa dos nossos serviços?
                Utilize os nossos canais de contacto.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-sm-6 col-lg-3">
                <div class="bg-light p-4 h-100 text-center">
                    <i class="fa-solid fa-phone text-success fs-2 mb-3"></i>

                    <h5 class="fw-bold">Telefone</h5>

                    <p class="text-secondary mb-0">
                        +244 900 000 000
                    </p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="bg-light p-4 h-100 text-center">
                    <i class="fa-solid fa-envelope text-success fs-2 mb-3"></i>

                    <h5 class="fw-bold">E-mail</h5>

                    <p class="text-secondary mb-0">
                        contacto@contamais.ao
                    </p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="bg-light p-4 h-100 text-center">
                    <i class="fa-solid fa-location-dot text-success fs-2 mb-3"></i>

                    <h5 class="fw-bold">Localização</h5>

                    <p class="text-secondary mb-0">
                        Luanda, Angola
                    </p>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="bg-light p-4 h-100 text-center">
                    <i class="fa-solid fa-clock text-success fs-2 mb-3"></i>

                    <h5 class="fw-bold">Horário</h5>

                    <p class="text-secondary mb-0">
                        Segunda a Sexta<br>
                        08h00 às 17h00
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Formulário de contacto -->
<section class="py-5 bg-light">
    <div class="container py-4">

        <div class="row g-5 align-items-center">

            <!-- Informações -->
            <div class="col-lg-5">
                <span class="text-success fw-semibold text-uppercase">
                    Contacte-nos
                </span>

                <h2 class="fw-bold mt-2 mb-4">
                    Vamos conversar sobre o seu negócio
                </h2>

                <p class="text-secondary lh-lg mb-4">
                    Preencha o formulário e envie-nos a sua mensagem.
                    A nossa equipa estará disponível para responder
                    às suas questões e apresentar as melhores soluções.
                </p>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="fa-solid fa-check-circle text-success fs-5"></i>
                    <span class="text-secondary">Atendimento profissional</span>
                </div>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <i class="fa-solid fa-check-circle text-success fs-5"></i>
                    <span class="text-secondary">Respostas personalizadas</span>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-check-circle text-success fs-5"></i>
                    <span class="text-secondary">Acompanhamento dedicado</span>
                </div>
            </div>

            <!-- Formulário -->
            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 shadow-sm">

                    <h4 class="fw-bold mb-4">Envie-nos uma mensagem</h4>

                    <?php if ($success): ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i>
                            Mensagem enviada com sucesso! Entraremos em contacto consigo.
                        </div>
                    <?php endif; ?>

                    <?php if (isset($errors['general'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                            <?= htmlspecialchars($errors['general'], ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" novalidate>

                        <!-- Token CSRF -->
                        <input
                            type="hidden"
                            name="csrf_token"
                            value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>"
                        >

                        <div class="row g-3">

                            <!-- Nome -->
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">
                                    Nome completo
                                </label>

                                <input
                                    type="text"
                                    class="form-control py-2 <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                                    id="name"
                                    name="name"
                                    value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"
                                    placeholder="O seu nome"
                                    required
                                >

                                <?php if (isset($errors['name'])): ?>
                                    <div class="invalid-feedback">
                                        <?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- E-mail -->
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">
                                    E-mail
                                </label>

                                <input
                                    type="email"
                                    class="form-control py-2 <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                    id="email"
                                    name="email"
                                    value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
                                    placeholder="seu@email.com"
                                    required
                                >

                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback">
                                        <?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Telefone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">
                                    Telefone
                                </label>

                                <input
                                    type="tel"
                                    class="form-control py-2 <?= isset($errors['phone']) ? 'is-invalid' : '' ?>"
                                    id="phone"
                                    name="phone"
                                    value="<?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?>"
                                    placeholder="+244 900 000 000"
                                >

                                <?php if (isset($errors['phone'])): ?>
                                    <div class="invalid-feedback">
                                        <?= htmlspecialchars($errors['phone'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Assunto -->
                            <div class="col-md-6">
                                <label for="subject" class="form-label fw-semibold">
                                    Assunto
                                </label>

                                <select
                                    class="form-select py-2 <?= isset($errors['subject']) ? 'is-invalid' : '' ?>"
                                    id="subject"
                                    name="subject"
                                    required
                                >
                                    <option value="" disabled <?= $subject === '' ? 'selected' : '' ?>>
                                        Selecione um assunto
                                    </option>

                                    <option value="Contabilidade Geral" <?= $subject === 'Contabilidade Geral' ? 'selected' : '' ?>>
                                        Contabilidade Geral
                                    </option>

                                    <option value="Consultoria Fiscal" <?= $subject === 'Consultoria Fiscal' ? 'selected' : '' ?>>
                                        Consultoria Fiscal
                                    </option>

                                    <option value="Gestão Financeira" <?= $subject === 'Gestão Financeira' ? 'selected' : '' ?>>
                                        Gestão Financeira
                                    </option>

                                    <option value="Processamento Salarial" <?= $subject === 'Processamento Salarial' ? 'selected' : '' ?>>
                                        Processamento Salarial
                                    </option>

                                    <option value="Constituição de Empresas" <?= $subject === 'Constituição de Empresas' ? 'selected' : '' ?>>
                                        Constituição de Empresas
                                    </option>

                                    <option value="Consultoria Empresarial" <?= $subject === 'Consultoria Empresarial' ? 'selected' : '' ?>>
                                        Consultoria Empresarial
                                    </option>

                                    <option value="Outro" <?= $subject === 'Outro' ? 'selected' : '' ?>>
                                        Outro assunto
                                    </option>
                                </select>

                                <?php if (isset($errors['subject'])): ?>
                                    <div class="invalid-feedback">
                                        <?= htmlspecialchars($errors['subject'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Mensagem -->
                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">
                                    Mensagem
                                </label>

                                <textarea
                                    class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                                    id="message"
                                    name="message"
                                    rows="5"
                                    maxlength="5000"
                                    style="resize: none;"
                                    placeholder="Escreva a sua mensagem..."
                                    required
                                ><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></textarea>

                                <?php if (isset($errors['message'])): ?>
                                    <div class="invalid-feedback">
                                        <?= htmlspecialchars($errors['message'], ENT_QUOTES, 'UTF-8') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Botão -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-success w-100 px-4 py-3">
                                    <i class="fa-solid fa-paper-plane me-2"></i>
                                    Enviar mensagem
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- Mapa -->
<section class="py-5">
    <div class="container py-4">

        <div class="text-center mb-5">
            <span class="text-success fw-semibold text-uppercase">
                Onde estamos
            </span>

            <h2 class="fw-bold mt-2">Visite-nos</h2>

            <p class="text-secondary mx-auto" style="max-width: 600px;">
                Estamos disponíveis para recebê-lo e apresentar
                as nossas soluções pessoalmente.
            </p>
        </div>

        <div class="ratio ratio-21x9">
            <iframe
                src="https://www.google.com/maps?q=Luanda,Angola&output=embed"
                width="100%"
                height="450"
                style="border: 0;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Localização da ContaMais em Luanda"
            ></iframe>
        </div>

    </div>
</section>
