$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_errno){
    echo "erro na conecção <br>";
}
