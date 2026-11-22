<section class="page-banner"
    style="background-image:
        linear-gradient(rgba(10, 30, 19, 0.75), rgba(10, 30, 19, 0.75)),
        url('/assets/img/<?= htmlspecialchars($banner_image) ?>');">

    <div class="container text-center">
        <h1 class="text-white fw-bold mb-3">
            <?= htmlspecialchars($banner_title) ?>
        </h1>

        <p class="text-white-50 mx-auto mb-4" style="max-width: 650px;">
            <?= htmlspecialchars($banner_text) ?>
        </p>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/" class="text-white text-decoration-none">Início</a>
                </li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">
                    <?= htmlspecialchars($banner_title) ?>
                </li>
            </ol>
        </nav>
    </div>
</section>