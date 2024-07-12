<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="./css/preguntasfrecuentes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <!-- Navbar -->
  <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-color">
            <div class="container">
                <!-- LOGO -->
                <a class="" href="index.php"><img class="logo" src="./images/New_Logo_EyC2024-removebg-preview.png" alt=""></a>
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php"><strong>INICIO</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.php"><strong>NOSOTROS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="contactos.php"><strong>CONTACTOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="servicios.php"><strong>SERVICIOS</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="agendar_cita.php"><strong>AGENDA TU CITA</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="certificado.php"><strong>CERTIFICADO</strong></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"><strong>TEAM</strong></a>
                            <ul class="dropdown-menu dropdown-team-politicas" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php#team">TEAM</a></li>
                                <li><a class="dropdown-item" href="index.php#news">NEWS</a></li>
                                <li><a class="dropdown-item" href="index.php#projects">PROYECTOS</a></li>
                                <li><a class="dropdown-item" href="trabaja-con-nosotros.php">TRABAJA CON NOSOTROS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="./login.php"><strong>CORPORATIVO</strong></a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPoliticas" role="button"data-bs-toggle="dropdown" aria-expanded="false">POLÍTICAS</a>
                        <ul class="dropdown-menu dropdown-team-politicas" aria-labelledby="navbarDropdownPoliticas">
                            <li><a class="dropdown-item" href="./politicas.php">Políticas</a></li>
                            <li><a class="dropdown-item" href="./politicasetica.php">Política ética</a></li>
                            <li><a class="dropdown-item" href="./politicastratamiento.php">Políticas tratamiento</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="faq-container">
        <h1>Preguntas Frecuentes</h1>
        <div class="faq-item">
            <button class="faq-question">¿Cómo puedo comprar boletos en línea?</button>
            <div class="faq-answer">
                <p>Puedes comprar boletos en línea siguiendo estos pasos: ...</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">¿Cuáles son las formas de pago aceptadas?</button>
            <div class="faq-answer">
                <p>Aceptamos las siguientes formas de pago: ...</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">¿Puedo cambiar o devolver mi boleto?</button>
            <div class="faq-answer">
                <p>Las políticas de cambio y devolución son: ...</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">¿Qué debo hacer si no recibí mi boleto por correo electrónico?</button>
            <div class="faq-answer">
                <p>Si no recibiste tu boleto, sigue estos pasos: ...</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">¿Qué es un código de promoción y cómo puedo usarlo?</button>
            <div class="faq-answer">
                <p>Un código de promoción es... y puedes usarlo de la siguiente manera: ...</p>
            </div>
        </div>
    </div>
    <script src="./js/PF.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
