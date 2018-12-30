

 <!DOCTYPE html><!DOCTYPE ht 
<html>
    <body>

        <form action="" method="post">

            <label>Origin:</label> <input type="text" name="o" placeholder="Enter Origin location" required> <br><br>
            <label>Destination:</label> <input type="text" name="d" placeholder="Enter Destination location" required> <br><br>
            <input type="submit" value="Calculate distance & time" name="submit"> <br><br>

        </form>

        <?php
            if(isset($_POST['submit'])){
            $origin = $_POST['o']; $destination = $_POST['d'];
            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&AIzaSyAdx_5p5Y17Xo1rfovONEvvOC6LtpQzNOM&#038");
			
            $data = json_decode($api);
			
			//$json = file_get_contents('http://maps.google.com/maps/nav?q=from:39.519894,-5.105667%20to:51.129079,1.306925');
//$data = json_decode(utf8_encode($json),true);
// var_dump($data);
        ?>

            <label><b>Distance: </b></label> <span><?php echo ((int)$data->rows[0]->elements[0]->distance->value / 1000).' Km'; ?></span> <br><br>
            <label><b>Travel Time: </b></label> <span><?php echo $data->rows[0]->elements[0]->duration->text; ?></span> 

        <?php } ?>

    </body>
</html>