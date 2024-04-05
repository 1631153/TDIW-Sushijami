<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once "connectaDB.php";

function getCategories(){
    $categorias = NULL;
    try {
        $conn = connectaBD();
        $query = "SELECT * FROM category";
        $result = pg_query($conn, $query);
        if(!$result){
            throw new Exception();
        }else{
            $categorias = pg_fetch_all($result);
        }
        if($conn){pg_close($conn);}
    } catch (\Throwable $th) {
        throw new Exception("Error getCategories");
    }

    return $categorias;
    //return $GLOBALS['graus'];
}

function getProduct($categoria){
    $producte = NULL;
    try {
        $conn = connectaBD();
        $query = "SELECT * FROM product WHERE category_id=$categoria";
        $result = pg_query($conn, $query);
        if(!$result){
            throw new Exception();
        }else{
            $producte = pg_fetch_all($result);
        }
        if($conn){pg_close($conn);}
    } catch (\Throwable $th) {
        throw new Exception("Error getProduct");
    }

    return $producte;
    //return $GLOBALS['mencions'][$grau];
}

function login($email, $contra){
    try {
        $conn = connectaBD();
        $query = "SELECT * FROM users WHERE correu_electronic='$email'";
        $result = pg_query($conn, $query);

        if (!$result) {
            echo "<script>
                    alert('El correo electrónico no existe');
                    location.href = '../index.php';
                  </script>";
            return NULL;
        } else {
            $row = pg_fetch_assoc($result);
            if (!$row) {
                echo "<script>
                    alert('El correo electrónico no existe');
                    location.href = '../index.php';
                  </script>";
                return NULL;
            }
            $Correo = $row['correu_electronic'];
            $contraseña = $row['password'];
            $nom = $row['nom_complet'];

            if ($email === $Correo) {
                if (password_verify($contra, $contraseña)) {
                    $_SESSION['usuario'] = true;
                    $_SESSION['ID'] = $row['id'];
                    $_SESSION['nombre'] = $nom;
                    $_SESSION['correo'] = $Correo;
                    $_SESSION['contraseña'] = $contraseña;
                    $_SESSION['adreca'] = $row['adreca'];
                    $_SESSION['poblacio'] = $row['poblacio'];
                    $_SESSION['codi_postal'] = $row['codi_postal'];
                    $_SESSION['img_path'] = $row['img_path'];
                    $_SESSION['productes_carrito'] = 0;

                    echo "<script>
                            alert('Bienvenido $nom');
                            location.href = '../index.php';
                            </script>";
                }else {
                    echo "<script>
                            alert('Error login: La contraseña es incorrecta');
                            location.href = '../index.php';
                            </script>";
                }
            }
        }
    }catch (\Throwable $th) {
        echo "<script>
                            alert('Error de login');
                            location.href = '../index.php';
                            </script>";
    }
}

function actualizar_valores(){
    try {
        $conn = connectaBD();
        $id = $_SESSION['ID'];
        $query = "SELECT * FROM users WHERE id=$id";
        $result = pg_query($conn, $query);

        if (!$result) {
            return NULL;
        } else {
            $row = pg_fetch_assoc($result);
            $_SESSION['nombre'] = $row['nom_complet'];
            $_SESSION['correo'] = $row['correu_electronic'];
            $_SESSION['contraseña'] = $row['password'];
            $_SESSION['adreca'] = $row['adreca'];
            $_SESSION['poblacio'] = $row['poblacio'];
            $_SESSION['codi_postal'] = $row['codi_postal'];
            $_SESSION['img_path'] = $row['img_path'];
        }
    }catch (\Throwable $th) {
        throw new Exception("Error login");
    }
}

function productoprecio()
{
    if ($_SESSION['productos_en_carrito'] > 0) {
        $_SESSION['precio_total'] = 0;
        $_SESSION['cantidad_total'] = 0;
        foreach ($_SESSION['productos_en_carrito'] as $producto) {
            $_SESSION['precio_total'] += $producto['cantidad'] * $producto['precio'];
            $_SESSION['cantidad_total'] += $producto['cantidad'];
        }
    }
}
?>

