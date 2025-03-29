
<?php
session_start(); //start a session to store user data

include("db.php");//include database connection file

$pagename="Smart Basket"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>"; //display name of the page as window title

echo "<body>";

include ("headfile.html"); //include header layout file

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//display random text
//if the posted ID of the new product is set i.e. if the user is adding a new product into the basket
if (isset($_POST['h_prodid'])){
    $newprodid = $_POST['h_prodid'];
    //capture the required quantity of selected product using the POST method and $_POST superglobal variable
    //and store it in a new local variable called $reququantity
    $reququantity = $_POST['p_quantity'];
    // //Display id of selected product
    // echo "<p>Selected product Id: ".$newprodid;
    // //Display quantity of selected product
    // echo "<p>Selected quantity: ".$reququantity;
    
    //create a new cell in the basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity
    $_SESSION['basket'][$newprodid]=$reququantity;
    echo "<p>1 item added";
}
else{
    //Display "Basket unchanged " message
    echo "<p>Basket unchanged";
}
//else
//Display "Basket unchanged " message
//capture the ID of selected product using the POST method and the $_POST superglobal variable

//and store it in a new local variable called $newprodid



include("footfile.html"); //include head layout

echo "</body>";

?>