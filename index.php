<?php 
 
$weather = "";
 
$errorMessage = "";
 
 
  
if($_GET['city'])
{
 
   $urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",".urlencode($_GET['country'])."&appid=dc840de23e1a6aa93961c426b63e1212");
   
   $weatherArray = json_decode($urlContents , true);
   
   if($weatherArray['cod'] == 200)
   {
   
   $weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. <br>";
   
   $tempInCelcius = intval($weatherArray['main']['temp'] - 273.15);
   
   $weather .= " The Temperature Is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s".".";
   }
   else
   {
       $errorMessage = "Could not find city - please try again.";
   }
 
} 
 
 
?>
 
<!DOCTYPE html>
 
<html lang="en">
    
  <head>
      
      <title>Weather Forecast By AV</title>
      
      <link rel="icon" type="image/icon" href="icon.jpg">
      
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  
  <style type="text/css">
      
      html { 
          
  background: url(background.jpg) no-repeat center center fixed; 
  
  -webkit-background-size: cover;
  
  -moz-background-size: cover;
  
  -o-background-size: cover;
  
  background-size: cover;
}
 
body {
    
    background:none;
    
}
 
.container {
    
    text-align:center;
    margin-top:180px;
    width:600px;
    
}
 
h1 {
    
    color:green;
    
}
 
label {
    
    margin-top:20px;
    
}
 
#weather {
    
    margin-top:40px;
}
 
 
      
  </style>
  
  </head>
  
  <body>
    
    <div class="container">
        
        <h1><b>Check Weather!</b></h1>
        
        <form>
            
  <div class="form-group">
      
    <label for="city" style="color:darkgreen;">Enter City!</label>
    
    <input type="text" class="form-control" id="city" name="city" placeholder="Eg. New Delhi, Mumbai, Chicago" value="<?php 
    
    if(array_key_exists('city', $_GET)) {
    
    echo $_GET['city']; 
    
    }
    
    ?>">
    
  </div>
 
  
  <div class="form-group">
  
      <label for="city" style="color:darkgreen;">Enter Country of the city, you entered <b>NOTE: </b>Please enter name of America as USA and England as UK.</label>
    
    <input type="text" class="form-control" id="country" name="country" placeholder="Eg. India, USA" value="<?php 
    
    if(array_key_exists('country', $_GET)) {
        
    echo $_GET['country']; 
    
    }
    
    ?>">
    
  </div>
  
  <button type="submit" class="btn btn-success">Submit</button>
  
  
</form>
 
    <div id="weather"><?php 
    
    if($weather) {
        
    echo   '<div class="alert alert-success" role="alert">
      <b> '.$weather.'
</b></div>';
        
    } else  if($errorMessage) {
        
    echo   '<div class="alert alert-danger" role="alert">
      <b> '.$errorMessage.'
</b></div>';
 
    } 
        
    
    ?></div>
    
        
    
    </div>
    
 
    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
 
  </body>
  </html>
 
