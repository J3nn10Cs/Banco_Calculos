<?php
    include "../PHP/create.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Css/Style.css">
    <title>Document</title>
</head>
<body>

    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a href="../View/index.html" class="logo">
                    <h1 class="logo__nombre">Banco<span class="logo__bold">Cálculo</span></h1>  
                </a>
                <nav class="navegacion">
                    <a href="../View/index.html" class="navegacion__banco">Inicio</a>
                    <a href="../View/contact.html" class="navegacion__banco">Contacto</a>
                </nav>
            </div>
        </div>
        <div class="header__texto">
            <h2>Haga sus cálculos y contactenos</h2>
        </div>
    </header>

    <form class="contact-frm f3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="FData" method="post">
        <h1 class="campo_h1">Contacto</h1>
        <div class="campo">
            <label for="Name" class="form-label">Nombre :</label>
            <input type="text" name="Name" id="Name" class="form-control" value="<?php echo $name ?>">
        </div>
        <div class="campo">
            <label for="FirstName" class="form-label">Apelido :</label>
            <input type="text" name="FirstName" id="FirstName" class="form-control" value="<?php echo $lastaname ?>">
        </div>
        <div class="campo">
            <label for="Number" class="form-label">Número :</label>
            <input type="number" name="" id="Number" class="form-control" value="<?php echo $number ?>">
        </div>
        <div class="campo">
            <label for="Email" class="form-label">Correo :</label>
            <input type="email" name="Email" id="Email" class="form-control" value="<?php echo $gmail ?>">
        </div>
        <div class="campo">
            <label for="Country" class="form-label">País :</label>
            <input type="text" name="Country" id="Country" class="form-control" value="<?php echo $country ?>">
        </div>
        <div class="campo">
            <label for="City" class="form-label">Ciudad :</label>
            <input type="text" name="City" id="City" class="form-control" value="<?php echo $city ?>">
        </div>
        <div class="campo">
            <button class="boton boton--secundario">Contactar <i class="bi bi-cash-stack"></i></button>
        </div>
    </form>

    <footer class="footer">
        <div class="contenedor">
            <div class="barra">
                <h1 class="logo__nombre">Banco<span class="logo__bold">Cálculo</span></h1>
            
                <nav class="navegacion">
                    <a href="../View/index.html" class="navegacion__banco">Inicio</a>
                    <a href="../View/contact.html" class="navegacion__banco">Contacto</a>
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>