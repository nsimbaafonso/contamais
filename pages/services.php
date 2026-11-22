<?php include "includes/page-banner.php"; ?>

<section class="py-5">
    <div class="container py-4">

        <div class="text-center mb-5">
            <span class="text-success fw-semibold text-uppercase">
                O que fazemos
            </span>

            <h2 class="fw-bold mt-2">Os nossos serviços</h2>

            <p class="text-secondary mx-auto" style="max-width: 600px;">
                Soluções profissionais para ajudar a sua empresa
                a manter uma gestão contabilística e financeira eficiente.
            </p>
        </div>

        <?php
        $services = [
            [
                'icon' => 'fa-calculator',
                'title' => 'Contabilidade Geral',
                'description' => 'Organização, registo e acompanhamento das operações contabilísticas da sua empresa.'
            ],
            [
                'icon' => 'fa-file-invoice-dollar',
                'title' => 'Consultoria Fiscal',
                'description' => 'Apoio no cumprimento das obrigações fiscais e orientação em matéria tributária.'
            ],
            [
                'icon' => 'fa-chart-line',
                'title' => 'Gestão Financeira',
                'description' => 'Controlo de receitas, despesas e recursos para uma gestão financeira mais eficiente.'
            ],
            [
                'icon' => 'fa-users',
                'title' => 'Processamento Salarial',
                'description' => 'Preparação de folhas salariais e apoio na gestão administrativa de pessoal.'
            ],
            [
                'icon' => 'fa-building',
                'title' => 'Constituição de Empresas',
                'description' => 'Orientação e apoio nos procedimentos necessários para formalizar o seu negócio.'
            ],
            [
                'icon' => 'fa-briefcase',
                'title' => 'Consultoria Empresarial',
                'description' => 'Orientação para melhorar processos, organização e desempenho da sua empresa.'
            ],
        ];
        ?>

        <div class="row g-4">

            <?php foreach ($services as $service): ?>
                <div class="col-md-6 col-lg-4">

                    <div class="card border h-100 p-4 shadow-sm">

                        <div class="mb-4">
                            <div class="d-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success"
                                 style="width: 60px; height: 60px;">
                                <i class="fa-solid <?= htmlspecialchars($service['icon']) ?> fs-3"></i>
                            </div>
                        </div>

                        <h5 class="fw-bold mb-3">
                            <?= htmlspecialchars($service['title']) ?>
                        </h5>

                        <p class="text-secondary lh-lg flex-grow-1">
                            <?= htmlspecialchars($service['description']) ?>
                        </p>

                        <a href="/contactos" class="btn btn-outline-success mt-3">
                            Solicitar serviço
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>

                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>



<section class="py-5 bg-success">
    <div class="container py-4">
        <div class="row align-items-center g-4">

            <div class="col-lg-8 text-center text-lg-start">
                <h2 class="text-white fw-bold mb-3">
                    Precisa de apoio para gerir o seu negócio?
                </h2>

                <p class="text-white-50 mb-0">
                    Entre em contacto com a ContaMais e descubra como
                    podemos ajudar a sua empresa a crescer com segurança
                    e organização.
                </p>
            </div>

            <div class="col-lg-4 text-center text-lg-end">
                <a href="/contactos" class="btn btn-light text-success fw-semibold px-4 py-3">
                    Fale connosco
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>

        </div>
    </div>
</section>
