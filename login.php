<?php
$uname=$_POST['uname'];
$password=$_POST['password'];
if (!empty($uname))
    {
        $con=mysqli_connect("localhost","root","","login_info");
        if (mysqli_connect_error())
        {
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        }
        else
        {

            
            $result=mysqli_query($con,"SELECT * FROM  `login` WHERE  `uname` =  '$uname' &&  `password` =  '$password'");
            $count=mysqli_num_rows($result);
            if($count==1)
            {
                 echo"login successfull";
                 header("Location:frame.html");
            }
            else
            {
                echo "Credentials are wrong...";
                echo "Error: ". $sql ."
                ". $conn->error;
            }
            $con->close();
        }
    }
else{
    echo"username should not be empty";     
}
?>