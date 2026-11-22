# ContaMais

Website institucional desenvolvido em PHP para uma empresa fictícia de contabilidade e consultoria financeira. O projeto foi criado como parte do estudo de PHP moderno.

**Website:** https://contamais.kesug.com/

## Tecnologias utilizadas

- PHP 8
- HTML5 e CSS3
- Bootstrap 5
- Font Awesome 7
- PHPMailer
- Composer
- Apache (.htaccess)

## Funcionalidades

- Apresentação institucional da empresa.
- Página de serviços.
- Página sobre a empresa.
- Formulário de contacto com envio de e-mails via SMTP.
- Validação de formulários.
- Páginas personalizadas de erro 403, 404 e 500.
- Proteção CSRF no formulário de contacto.

## Executar localmente

**Requisitos:**
- PHP 8 ou superior.
- Apache.
- Composer.
- Laragon ou outro ambiente PHP local.

**1. Clonar o repositório**

```bash
git clone https://github.com/SEU-USUARIO/contamais.git
```

**2. Entrar na pasta**

```bash
cd contamais
```

**3. Instalar as dependências**

```bash
composer install
```

**4. Configurar a aplicação**

Edite `config/app.php` e defina o endereço local:

```php
define('APP_URL', 'http://contamais.test');
```

Configure também as credenciais SMTP em `config/mail.php`, utilizando uma conta Gmail e uma senha de aplicação.

**5. Executar**

Coloque o projeto na pasta pública do Apache e configure o domínio local. Depois, aceda a:

```text
http://contamais.test
```

## Estrutura do projeto

```text
contamais/
├── assets/
├── config/
├── includes/
├── pages/
├── errors/
├── vendor/
├── .htaccess
├── composer.json
└── index.php
```

## Hospedagem

O projeto está publicado gratuitamente no InfinityFree:

https://contamais.kesug.com/

## Autor

**Nsimba Afonso**