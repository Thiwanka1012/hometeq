<?php
session_start();

$pagename="Sign Up"; //Create and populate a variable called $pagename

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet

echo "<title>".$pagename."</title>";
//display name of the page as window title

echo "<body>";
    include ("headfile.html");
    //include header layout file

    echo "<h4>".$pagename."</h4>";
    
    echo "<form action=login_process.php method=post>";
        echo "<table id=baskettable style='border: 0px'>";

            echo "<tr>
                <td style='border: 0px'>*Email Address </td>";
                echo "<td style='border: 0px'>
                    <input type=text name=l_email size=35>
                </td>
            </tr>";

            echo "<tr>
                <td style='border: 0px'>*Password </td>";
                echo "<td style='border: 0px'>
                    <input type=password name=l_password1 maxlength=10 size=35>
                </td>
            </tr>";

            echo "<tr>";
                    echo "<td style='border: 0px'>
                        <input type=reset value='Clear Form' name='submitbtn' id='submitbtn'> 
                    </td>";
                    echo "<td style='border: 0px'>
                        <input type=submit value='Log In' name='submitbtn' id='submitbtn'>
                    </td>";
            echo "</tr>";

        echo "</table>";
    echo "</form>";
        
    include("footfile.html");
    //include foot layout
echo "</body>";
?>