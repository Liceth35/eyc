<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verificación de Certificados</title>
    <link rel="stylesheet" href="./css/certificado.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="container">
                <!-- LOGO -->
					<div class="logo pull-left">
						<a href="index.php" ><span class="b1">e</span><span class="b2">&</span><span class="b3">c</span><span class="b4"></span><span class="b5"></span></a>
					</div><!-- //LOGO -->
                <!-- Menu -->
                <nav class="navmenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="index.php"><strong>Inicio</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.php"><strong>Nosotros</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="contactos.php"><strong>Contactos</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="servicios.php"><strong>Servicios</strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="certificado.php"><strong>Certificado</strong></a></li>
                        <li class="sub-menu">
                            <a href="javascript:void(0);" style="color:white;">Team</a>
                            <ul>
                                <li class="scroll_btn"><a href="index.php#team">Team</a></li>
                                <li class="scroll_btn"><a href="index.php#news">News</a></li>
                                <li class="scroll_btn"><a href="#projects">Proyectos</a></li>
                                <li><a href="trabaja-con-nosotros.php">Trabaja con nosotros</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="login.php"><strong>Corporativo</strong></a></li>
                        <li class="sub-menu">
                            <a href="javascript:void(0);" style="color:white;">Políticas</a>
                            <ul>
                                <li><a href="politicas.php">Políticas de seguridad</a></li>
                                <li><a href="politicastratamiento.php">Política de tratamiento</a></li>
                                <li><a href="politicasetica.php">Política ética</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <h2>Verificación de Certificados</h2>
    <form action="verificar_certificado.php" method="POST">
        <label for="identificacion">Número de Identificación:</label><br>
        <input type="text" id="identificacion" name="identificacion" required><br><br>

        <label for="codigo">Código del Certificado:</label><br>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <button type="submit">Verificar Certificado</button>
    </form>
</body>
</html>
