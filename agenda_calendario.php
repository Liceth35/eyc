<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="css/calendario.css">

</head>
<body>
    <div class="container">
        <div class="step">
            <div class="step-number">1</div>
            <div class="step-title">Seleccionar Sede</div>
        </div>
        <div class="step active">
            <div class="step-number">2</div>
            <div class="step-title">Seleccionar Día y Hora</div>
        </div>
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-title">Diligenciar Datos</div>
        </div>

        <div class="calendar-container">
            <div class="calendar-header">Calendario de citas</div>
            <div id="calendar"></div>
        </div>

        <div class="time-selection">
            <div class="time-header">Seleccionar Horario de Atención</div>
            <div class="time-slots">
                <label><input type="radio" name="time" value="7:00-9:00"> 7:00 am - 9:00 am</label>
                <label><input type="radio" name="time" value="9:00-12:00"> 9:00 am - 12:00 pm</label>
                <label><input type="radio" name="time" value="13:00-15:00"> 1:00 pm - 3:00 pm</label>
                <label><input type="radio" name="time" value="15:00-17:00"> 3:00 pm - 5:00 pm</label>
            </div>
        </div>

        <button class="continue-button">Continuar</button>
    </div>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/calendario.js" defer></script>
</body>
</html>
