<?php 
require "adatbazis.php";
session_start();

if(mysqli_connect_error()){
    echo "
    <script>
    aler('Nem lehet csatalkozni a szerverhez!);
    window.location.href = 'kosar.php';
    </script>
    ";
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['vasarlas'])){
        $query1 ="INSERT INTO `megrendelo`(`teljesnev`, `telefon`, `lakcim`, `fizetes_mod`) VALUES ('($_POST[teljesnev]','($_POST[telefon]','($_POST[lakcim]','($_POST[pay_mode]')";
        if(mysqli_query($conn,$query1))
        {
            $id = mysqli_insert_id($conn);
            $query2 = "INSERT INTO `felhasznalo_vetel`(`id`, `termek_nev`, `termek_ar`, `termek_menny`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($conn, $query2);

            if($stmt){
                mysqli_stmt_bind_param($stmt,"isii", $rendeles_id, $termek_nev, $termek_ar,$termek_menny);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $termek_nev=$values['Item_Name'];
                    $termek_ar=$values['Price'];
                    $termek_menny=$values['Quantity'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                aler('A rendelés elfogadásra került!);
                window.location.href = 'index.php';
                </script>";
            }else{
                echo "<script>
                aler('Rendelés elutasítva!);
                window.location.href = 'index.php';
                </script>";
            }

        }else {
            echo "
            <script>
            aler('SQL HIBA!);
            window.location.href = 'index.php';
            </script>
            "; 
        }
    }
}


?>