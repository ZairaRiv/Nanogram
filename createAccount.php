<!DOCTYPE HTML> 
<html> 
    <head> 
        <title>Sign-Up</title> 
    </head> 
        
        
    <body id="body-color"> 
        <div id="Sign-Up"> 
        <form method="POST" action="validateAccount.php"> 
            <fieldset style="width:30%">
            <legend>Registration Form</legend> 
            <table border="0"> 
                
                    <tr>
                    <td>First Name</td><td> <input type="text" name="firstname"></td> 
                </tr> 
                    <tr> 
                    <td>Last Name</td><td> <input type="text" name="lastname"></td> 
                </tr> 
                    <tr> 
                    <td>User Name</td><td> <input type="text" name="username"></td> 
                </tr> 
                <tr> 
                    <td>Email</td><td> <input type="text" name="email"></td> 
                </tr> 
                    <tr> 
                        <td>Age</td><td> <input type="text" name="age"></td> 
                    </tr> 
                        <tr> 
                            <td>Gender</td><td> <input type="text" name="gender"></td> 
                        </tr> 
                        <tr> 
                            <td>Location</td><td> <input type="text" name="location"></td> 
                        </tr> 
                            <tr> 
                                <td>Password</td><td> <input type="password" name="password"></td> 
                            </tr> 
                                    <tr> 
                                        <td><input id="button" type="submit" name="submit" value="Sign-Up"></td> 
                                        <input type = "hidden" value = "<?php echo $_GET["redirect"] ?>" name = "redirect"/>
                                    </tr> 
            </table> </fieldset> 
            </form> 
        </div> 
    </body>
</html>

