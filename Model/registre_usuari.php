<?php
include_once __DIR__ . "/connectaDB.php";

function validar_datos_registro($nom_complet, $correu_electronic, $password, $adreca, $poblacio, $codi_postal) {

    if (empty($nom_complet) || empty($correu_electronic) || empty($password) || empty($adreca) || empty($poblacio) || empty($codi_postal)) {
        return "Error: Debes rellenar todos los campos.";
    }

    // Validar la dirección de correo electrónico
    if (!filter_var($correu_electronic, FILTER_VALIDATE_EMAIL)) {
        return "Error: La dirección de correo electrónico no es válida.";
    }

    // Validar que el código postal sea un valor entero
    if (!filter_var($codi_postal, FILTER_VALIDATE_INT)) {
        return "Error: El código postal debe ser un valor entero.";
    }

    return null; //En caso de que no haya errores
}
function registrar_usuario()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $connexio = connectaBD();

        $nom_complet = filter_var($_POST['nom_complet'], FILTER_SANITIZE_STRING);
        $correu_electronic = filter_var($_POST['correu_electronic'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $adreca = filter_var($_POST['adreca'], FILTER_SANITIZE_STRING);
        $poblacio = filter_var($_POST['poblacio'], FILTER_SANITIZE_STRING);
        $codi_postal = filter_var($_POST['codi_postal'], FILTER_VALIDATE_INT);

        $password_encriptada = password_hash($password, PASSWORD_BCRYPT);

        $error = validar_datos_registro($nom_complet, $correu_electronic, $password, $adreca, $poblacio, $codi_postal);
        if ($error) {
            echo "<script> alert('$error'); window.history.back(); </script>";
        }else {
            //Insertar en la base de datos
            $query = "INSERT INTO users (nom_complet, correu_electronic, password, adreca, poblacio, codi_postal) VALUES ($1, $2, $3, $4, $5, $6)";
            $result = pg_query_params($connexio, $query, array($nom_complet, $correu_electronic, $password_encriptada, $adreca, $poblacio, $codi_postal));

            if (!$result) {
                die("Error en la consulta: " . pg_last_error());
            }

            // Redirige al usuario de vuelta a la página del formulario
            header('Location: /../index.php');
            exit;
        }
    }
}

function actualizar_usuario($id, $p_actual)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $connexio = connectaBD();

        $nom_complet = $_POST['nou-nom'];
        $correu_electronic = $_POST['nou-correu'];
        $adreca = $_POST['nova-adreca'];
        $poblacio = $_POST['nova-poblacio'];
        $codi_postal = $_POST['nova-codi'];
        $password_actual = $_POST['contra-actual'];
        if (password_verify($password_actual, $p_actual)) {
            $password = $_POST['nova-contra'];
            $password2 = $_POST['nova-contra2'];
            if ($password === $password2){
                $password_encriptada = password_hash($password, PASSWORD_BCRYPT);
            }else{
                die("La contra no es igual");
            }
        }
        if (!empty($password_encriptada)){
            $query = "UPDATE users SET nom_complet = $1, correu_electronic = $2, adreca = $3, poblacio = $4, codi_postal = $5, password = $6 WHERE id = $7";
            $result = pg_query_params($connexio, $query, array($nom_complet, $correu_electronic, $adreca, $poblacio, $codi_postal, $password_encriptada, $id));

        }else {
            $query = "UPDATE users SET nom_complet = $1, correu_electronic = $2, adreca = $3, poblacio = $4, codi_postal = $5 WHERE id = $6";
            $result = pg_query_params($connexio, $query, array($nom_complet, $correu_electronic, $adreca, $poblacio, $codi_postal, $id));

        }

        if(!$result) {
            die("Error en la consulta: " . pg_last_error());
        }

        // Redirige al usuario de vuelta a la página del perfil
        header('Location: /../cuenta.php');
        exit;
    }
}



?>