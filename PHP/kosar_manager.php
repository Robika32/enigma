<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['Add_to_cart'])) 
    {
        if (isset($_SESSION['cart'])) 
        {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $myitems)) 
            {
                echo "<script>
                    alert('A termék már hozzá van adva a kosárhoz!');
                    window.location.href = 'kosar.php';
                </script>";
            } 
            else 
            {
                $_count = count($_SESSION['cart']);
                $_SESSION['cart'][$_count] = $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                alert('A termék hozzá adva a kosárhoz!');
                window.location.href = 'kosar.php';
                </script>";
            }
        } 
        else 
        {
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
            echo "<script>
                alert('A termék hozzá adva a kosárhoz!');
                window.location.href = 'kosar.php';
            </script>";
        }
    }
    if(isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['Item_Name']==$_POST['Item_Name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "
                <script>
                    alert('Termék eltávolítva!');
                    window.location.href = 'kosar.php';
                </script>
                ";
            }
        }
    }

    if(isset($_POST['Mod_Quantity']))
    foreach($_SESSION['cart'] as $key => $value)
    {
        if($value['Item_Name']==$_POST['Item_Name'])
        {
            $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
            echo "
            <script>
            window.location.href='kosar.php';
            </script>
            ";
        }
    }
}

?>