 <!DOCTYPE html>
<html>
<head>

<style>
    body{background-color: #f2f2f2; color: #333;}
    .main{box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; margin-top: 10px;}
    h3{background-color: #4294D1; color: #f7f7f7; padding: 15px; border-radius: 4px; box-shadow: 0 1px 6px rgba(57,73,76,0.35);}
    .img-box{margin-top: 20px;}
    .img-block{float: left; margin-right: 5px; text-align: center;}
    p{margin-top: 0;}
    img{width: 375px; min-height: 250px; margin-bottom: 10px; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; border:6px solid #f7f7f7;}
</style>
</head>
    <body>
    <!-------------------Main Content------------------------------>
    <div class="container main">

        <h3>Showing Images from database</h3>
        <div class="img-box">
    <?php
        $host ="localhost";
        $uname = "root";
        $pwd = "";
        $db_name = "wardrobe";
        
        
        $file_path = 'top_images/';
        $result = mysqli_connect($host,$uname,$pwd,$db_name) or die("Could not connect to database." .mysqli_error());
        $type = mysqli_real_escape_string($result, $_POST['a']);
        //mysqli_select_db($result,$db_name) or die("Could not select the databse." .mysqli_error());
        $image_query = mysqli_query($result,"select image from top where type='$type'");
        while($rows = mysqli_fetch_array($image_query))
        {
            //$img_name = $rows['image'];
            $img_src = $rows['image'];
        ?>

        <div class="img-block">
        <img src="<?php echo "$file_path/"."$img_src"; ?>" alt=""  width="300" height="200" class="img-responsive" />
        
        </div>

        <?php
        }
    ?>
        </div>
    </div>
    </body>
</body>
</html>