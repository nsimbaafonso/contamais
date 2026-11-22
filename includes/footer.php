
<footer class="footer bg-dark text-white pt-5">

    <div class="container">
        <div class="row g-4 pb-5">

            <!-- Empresa -->
            <div class="col-lg-4 col-md-6">
                <a href="/" class="text-decoration-none text-white fs-3 fw-bold">
                    ContaMais<span class="text-warning">.</span>
                </a>

                <p class="text-white-50 mt-3 pe-lg-5">
                    Soluções de contabilidade e consultoria financeira
                    para ajudar empresas e empreendedores a gerir
                    melhor os seus negócios.
                </p>

                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="footer-social">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Navegação -->
            <div class="col-lg-2 col-md-6">
                <h5 class="fw-semibold mb-4">Navegação</h5>

                <ul class="list-unstyled footer-links">
                    <li><a href="/">Início</a></li>
                    <li><a href="/sobre">Sobre nós</a></li>
                    <li><a href="/servicos">Serviços</a></li>
                    <li><a href="/contactos">Contactos</a></li>
                </ul>
            </div>

            <!-- Serviços -->
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-semibold mb-4">Os nossos serviços</h5>

                <ul class="list-unstyled footer-links">
                    <li><a href="/servicos">Contabilidade geral</a></li>
                    <li><a href="/servicos">Consultoria fiscal</a></li>
                    <li><a href="/servicos">Consultoria financeira</a></li>
                    <li><a href="/servicos">Gestão financeira</a></li>
                </ul>
            </div>

            <!-- Contactos -->
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-semibold mb-4">Contactos</h5>

                <ul class="list-unstyled footer-contact">
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Luanda, Angola</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <span>+244 900 000 000</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <span>contacto@contamais.ao</span>
                    </li>
                    <li>
                        <i class="fa-regular fa-clock"></i>
                        <span>Segunda a sexta, 08h às 17h</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright -->
        <div class="border-top border-secondary py-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <p class="text-white-50 small mb-0">
                    &copy; <?= date('Y') ?> <?= APP_NAME ?>. Todos os direitos reservados.
                </p>

                <p class="text-white-50 small mb-0">
                    Contabilidade com confiança.
                </p>
            </div>
        </div>
    </div>

</footer>

<script src="/assets/js/bootstrap.bundle.min.js?v=<?= filemtime('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
