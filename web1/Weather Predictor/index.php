<!doctype html>
<html>
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Weather Predictor</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>



<style>
    html,body{
        height:100%;
    }
    .container {
        background-image:URL("windmill.jpg");	    
        width:100%;
        height:100%;
        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
        padding-top:200px;
        font-size:1.2em;
    }
    .container h1 {
        font-size:300%;
    }
    .center {
        text-align:center;
          }
    .white {
        color:white;
          }
    p {
        padding: 15px 0 15px 0;
    }
    button {
        margin-top:30px;
        padding:12px;
    }
    .alert {
        margin-top:70px;
        display:none;
    }

</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 center">
            <h1 class=" lead white center">Weather Predictor</h1>
            <p class="white center lead">Enter your city below to get a weather forecast!</p>
            <form>
                <div class="form-group center">
                    <input type="text" class="form-control" id="city" placeholder="Eg. London, Paris, San Francisco...">
                    <div id="submit">
                        <button class="btn btn-success btn-lg" type="submit" id="findWeather">Find Weather Here!</button>
                    </div>
                </div>
            </form>
            <div id="success" class="alert alert-success">Success!</div>
            <div id="fail" class="alert alert-danger">Sorry, couldn't find a result for that city. Please try again.</div>
            <div id="noCity" class="alert alert-danger">Please enter a city.</div>
        </div>
    </div>
    </div>

 <script>

$(".container").css("height",$(window).height());

$("#findWeather").click(function(event){
    event.preventDefault();
    //console.log($("#city").val());
    if ($("#city").val()!="") {
        $.get("scraper.php?city="+$("#city").val(), function(data){  
            //console.log(data);
            if (data==""){
                $("#success").hide();
                $("#noCity").hide();
                $("#fail").fadeIn();
            } 
            else {
                $("#fail").hide();
                $("#noCity").hide();
                $("#success").html(data).fadeIn();
            }
        });
    } 
    else {  
        $("#success").hide();
        $("#fail").hide();
        $("#noCity").fadeIn();
    } 
});

</script>
</body>
</html>
