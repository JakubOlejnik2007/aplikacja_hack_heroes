<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$data = file_get_contents('php://input');
$json = json_decode($data);
class Response {};
$response = new Response;
$response->message = "Welcome";

function login($email, $pass)
{
    $response = new Response;
    $query = 'SELECT * FROM users WHERE email="' . $email . '" AND password="' . $pass . '"';
    $host = "sql205.ezyro.com";
    $username = "ezyro_32833584";
    $password = "!QAZxsw23edc";
    $database = "ezyro_32833584_aplikacja_hack_heroes";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_errno) {

        $response->message = "Failed";
        $response = json_encode($response);

        echo "[";
        echo $response;
        echo "]";
        $conn->close();
        exit();
        return 0;
    }
    $result = $conn->query($query);
    if ($result->num_rows == 0) {
        $response->message = "Failed";
        $response = json_encode($response);

        echo "[";
        echo $response;
        echo "]";
        $conn->close();
        exit();
        return 0;
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $response->message = "Logged";
        $response->id = $row["id"];
        $response->imie = $row["imie"];
        $response->imiona = $row["imiona"];
        $response->imiona_rodzicow = $row["imiona_rodzicow"];
        $response->nazwisko_matki = $row["nazwisko_matki"];
        $response->nazwisko = $row["nazwisko"];
        $response->data_urodzenia = $row["data_urodzenia"];
        $response->miejsce_urodzenia = $row["miejsce_urodzenia"];
        $response->pesel = $row["pesel"];
        $response->email = $row["email"];
        $response->miejscowosc = $row["miejscowosc"];
        $response->gmina = $row["gmina"];
        $response->powiat = $row["powiat"];
        $response->wojewodztwo = $row["wojewodztwo"];
        $response->adres = $row["adres"];
        $response->kod_pocztowy = $row["kod_pocztowy"];
        $response->plec = $row["plec"];
        $response = json_encode($response);
        echo "[";
        echo $response;
        echo "]";
    }
    $conn->close();
    return 0;
    exit();
}

function register($email, $pass)
{
    $response = new Response;
    $host = "sql205.ezyro.com";
    $username = "ezyro_32833584";
    $password = "!QAZxsw23edc";
    $database = "ezyro_32833584_aplikacja_hack_heroes";
    $conn = new mysqli($host, $username, $password, $database);
    $result = $conn->query('SELECT * FROM users WHERE email="' . $email . '"');
    if ($result->num_rows > 0) {
        $response->message = "This user already exists";
        $response = json_encode($response);
        echo "[";
        echo $response;
        echo "]";
        $conn->close();
        return 0;
    }
    echo "Err";
    $query = 'INSERT INTO users (email,password) VALUES ("' . $email . '","' . $pass . '")';
    if ($conn->query($query) === TRUE) {
        $response->message = "Success";
        $response = json_encode($response);
        echo "[";
        echo $response;
        echo "]";
    } else {
        echo $conn->error;
    }
    $conn->close();
    return 0;
    exit();
}
function update($request)
{
    $response = new Response;
    $query = 'UPDATE users SET imie="'.$request->imie.'", imiona="'.$request->imiona.'", imiona_rodzicow="'.$request->imiona_rodzicow.'", nazwisko_matki="'.$request->nazwisko_matki.'", nazwisko="'.$request->nazwisko.'", data_urodzenia="'.$request->data_urodzenia.'", miejsce_urodzenia="'.$request->miejsce_urodzenia.'", pesel="'.$request->pesel.'", email="'.$request->email.'", miejscowosc="'.$request->miejscowosc.'", gmina="'.$request->gmina.'", powiat="'.$request->powiat.'", wojewodztwo="'.$request->wojewodztwo.'", adres="'.$request->adres.'", kod_pocztowy="'.$request->kod_pocztowy.'", plec="'.$request->plec.'" WHERE id='.$request->id;
    //$query = 'UPDATE users SET imie="'.$request->imie.'" WHERE id='.$request->id;
    $host = "sql205.ezyro.com";
    $username = "ezyro_32833584";
    $password = "!QAZxsw23edc";
    $database = "ezyro_32833584_aplikacja_hack_heroes";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_errno) {

        $response->message = "Failed";
        $response = json_encode($response);

        echo "[";
        echo $response;
        echo "]";
        $conn->close();
        exit();
        return 0;
    }
    $response->message="executing query";
    $conn->query($query);
    $query = 'SELECT * FROM users WHERE id='.$request->id;

    $result = $conn->query($query);
    $row = $result->fetch_assoc();

        $response->message = "Logged";
        $response->id = $row["id"];
        $response->imie = $row["imie"];
        $response->imiona = $row["imiona"];
        $response->imiona_rodzicow = $row["imiona_rodzicow"];
        $response->nazwisko_matki = $row["nazwisko_matki"];
        $response->nazwisko = $row["nazwisko"];
        $response->data_urodzenia = $row["data_urodzenia"];
        $response->miejsce_urodzenia = $row["miejsce_urodzenia"];
        $response->pesel = $row["pesel"];
        $response->email = $row["email"];
        $response->miejscowosc = $row["miejscowosc"];
        $response->gmina = $row["gmina"];
        $response->powiat = $row["powiat"];
        $response->wojewodztwo = $row["wojewodztwo"];
        $response->adres = $row["adres"];
        $response->kod_pocztowy = $row["kod_pocztowy"];
        $response->plec = $row["plec"];
    
    
    
    
    
    $response = json_encode($response);
    echo "[";
    echo $response;
    echo "]";
    
    $conn->close();
    return 0;
    exit();
}


if($json->operation == "LOGIN"){
    login($json->email, $json->password);
} elseif ($json->operation == "REGISTER") {
    register($json->email, $json->password);
} elseif ($json->operation == "UPDATE") {
    update($json);
} else {
    $response->message = 'Status 418 I am a teapot';
}
