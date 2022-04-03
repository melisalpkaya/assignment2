<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melis Alpkaya</title>
</head>
<body>

<?php

    $FROM = $_POST["from"]; 
    
    $TO = $_POST["to"]; 
    $CURRENCY1 = $_POST["currency1"];
    $CURRENCY2 = $_POST["currency2"];

    $currencyrates = [
        'USDtoCAD' => 1.25,
        'USDtoEUR' => 0.9,
        'CADtoUSD' => 0.80,
        'CADtoEUR' => 0.72,
        'EURtoUSD' => 1.11,
        'EURtoCAD' => 1.38,
        ];

    if($CURRENCY1 == "us")
    {
    
        if($CURRENCY2 == "us"){
            $TO = $FROM;
        }
        elseif($CURRENCY2 == "canadian"){
            $TO = bcmul($FROM,  $currencyrates['USDtoCAD'],2);
            
       
        }
        elseif($CURRENCY2 = "euro"){
            $TO = bcmul($FROM,  $currencyrates['USDtoEUR'],2);
        }
    }
    elseif($CURRENCY1 == "canadian"){
        if($CURRENCY2 == "canadian"){
            $TO = $FROM;
        }
        elseif($CURRENCY2 == "us"){
            $TO = bcmul($FROM, $currencyrates['CADtoUSD'],2);
        }
        elseif($CURRENCY2 = "euro"){
            $TO = bcmul($FROM, $currencyrates['CADtoEUR'],2);
        }
    }
    elseif($CURRENCY1 == "euro"){
        if($CURRENCY2 == "euro"){
            $TO = $FROM;
        }
        elseif($CURRENCY2 == "us"){
            $TO = bcmul($FROM, $currencyrates['EURtoUSD'],2);
        }
        elseif($CURRENCY2 = "canadian"){
            $TO = bcmul($FROM, $currencyrates['EURtoCAD'],2);
        }

       

    } 

?> 
<form  action="" method="post" enctype="multipart/form-data">

    <label>From:</label>
    <input name="from" type="text" value="<?php if(isset($_POST["from"])){ echo $_POST["from"]; } ?>"/> 

    <label for="Currency">Currency:</label>
    <select id="currency1" name="currency1" >
        <option value="us">US Dollar</option>
        <option value="canadian">Canadian Dollar</option>
        <option value="euro">Euro</option>
    </select><br>

    <label>To: </label>
    <input name="to" type="text" value=<?php echo ($TO)?>>

    <label for="Currency">Currency:</label>
    <select id="currency2" name="currency2" >
        <option value="us">US Dollar</option>
        <option value="canadian">Canadian Dollar</option>
        <option value="euro">Euro</option>
    </select><br>

    <input type="submit" value="Convert"/>

</form>

    


</body>
</html>