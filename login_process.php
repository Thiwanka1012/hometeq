<?php
session_start();

include("db.php");

$pagename="Your Login Results"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>";
//display name of the page as window title

echo "<body>";
    include ("headfile.html");
    //include header layout file
    
    echo "<h4>".$pagename."</h4>";
    //display name of the page on the web page
    
    //Capture the 2 inputs entered in the form (email and password) using the $_POST superglobal variable 
    //Assign these values to 2 new local variables $email and $password 
    //Display the content of these 2 variables to ensure that the values have been posted properly
    $email = $_POST['l_email'];
    $password = $_POST['l_password1'];

    //if either mandatory email or password fields in the form are empty   (hint: use the empty function)
    if (empty($email)or empty($password))  
    { 
    //Display error "Both email and password fields need to be filled in" message and link to login page
        echo "<p><b>Login failed!</b></p>";
        echo "<br><p>Log in form is incomplete.";
        echo "<br>Make sure you provide all the required details</p>";
        echo "<br>";
        echo "<br><p>Go back to <a href=login.php>Login</a></p>";
        echo "<br><br><br><br>"; 
    } 
    else
    { 
        //SQL query to retrieve the record from the users table for which the email matches login email (in form) 
        $SQL = "SELECT * FROM users WHERE userEmail ='".$email."';";
        //execute the SQL query & fetch results of the execution of the SQL query and store them in $arrayu  
        $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
        //also capture the number of records retrieved by the SQL query using function mysqli_num_rows and store it  
        //in a variable called $nbrecs 
        $nbrecs = mysqli_num_rows($exeSQL);
    
        //if the number of records is 0 (i.e. email retrieved from the DB does not match $email login email in form 
        if($nbrecs==0)        
        { 
            //display error message "Email not recognised, login again" 
            echo "<p><b>Login failed!</b></p>";
            echo "<br><p>Email not recognised, login again.";
            echo "<br>";
            echo "<br><p>Go back to <a href=login.php>Login</a></p>";
            echo "<br><br><br><br>";
        } 
        else 
        { 
        $arrayuser = mysqli_fetch_array($exeSQL); //create array of user for this email 
        //if password retrieved from the database (in arrayu) does not match $password
            if ($arrayuser['userPassword'] <> $password) //if the pwd in the array matches the pwd entered in the form 
            {     
                //display error message "Password not recognised, login again" 
                echo "<p><b>Login failed!</b>"; //display login error 
                echo "<br>Password not valid</p>"; 
                echo "<br><p> Go back to <a href=login.php>login</a></p>"; 
            } 
            else  
            { 
                echo "<p><b>Login success</b></p>"; //display login success 
                $_SESSION['userid'] = $arrayuser['userId'];  //create session variable to store the user id 
                $_SESSION['fname'] = $arrayuser['userFName'];  //create session variable to store the user first name 
                $_SESSION['sname'] = $arrayuser['userSName'];  //create session variable to store the user surname 
                $_SESSION['usertype'] = $arrayuser['userType']; //create session variable to store the user type 
                echo "<p>Welcome, ". $_SESSION['fname']." ".$_SESSION['sname']."</p>"; //display welcome greeting 
                            
                if ($_SESSION['usertype']=='C') //if user type is C, they are a customer 
                {     
                    echo "<p>User Type: homteq Customer</p>"; 
                } 
                if ($_SESSION['usertype']=='A') //if user type is A, they are an admin 
                {     
                    echo "<p>User type: homteq Administrator</p>"; 
                } 
                
                echo "<br><p>Continue shopping for <a href=index.php>Home Tech</a>"; 
                echo "<br>View your <a href=basket.php>Smart Basket</a></p>"; 
            }    
        } 
   } 

    include("footfile.html");
    //include foot layout
echo "</body>";
?>