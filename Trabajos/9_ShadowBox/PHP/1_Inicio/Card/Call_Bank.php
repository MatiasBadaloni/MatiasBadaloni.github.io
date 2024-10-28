<?php
// Conexión a la base de datos
$host = "";
$dbname = "";
$user = "";
$password = "";

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para buscar las imágenes en la tabla "borde" sin filtros adicionales
$sql = "SELECT url FROM png_bank WHERE 1";

// Ejecutar la consulta SQL
$result = $conn->query($sql);

// Array para almacenar las ubicaciones de las imágenes
$imagenes = array();

// Verificar si se encontraron resultados
if ($result && $result->num_rows > 0) {
    // Iterar sobre los resultados y almacenar las ubicaciones de las imágenes en el array
    while($row = $result->fetch_assoc()) {
        $imagenes[] = $row['url'];
    }
}

// Devolver las ubicaciones de las imágenes como JSON
echo json_encode($imagenes);

// Cerrar la conexión a la base de datos
$conn->close();
?>
