<!--index.php-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Social Networks API's</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>  
      <style>
          body{
            background: url(balloons.jpg) center center fixed;
              background-size: cover;
              text-align: center;
              font-family: Arvo, serif;
          }
          
          .jumbotron{
            background-color: transparent;   
          }
          .jumbotron h1{
            letter-spacing: 2.5px;   
          }
          
          .form-horizontal{
            margin-top: 50px;   
          }
          
          .row{
            margin-top: 30px;   
          }
          
          .col-sm-2{
            margin-bottom: 10px;   
          }
      </style>

  </head>
  <body>
      
      <!--Facebook code-->
      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=968559259884051";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
      <div class="jumbotron">
          <div class="container-fluid">
              <h1>Join us and build Freedom</h1>
              <p>We make freedom, we love freedom, we spread freedom.</p>
          </div>
          
          <form class="form-horizontal">
              <div class="form-group">
                  <div class="col-xs-offset-2 col-xs-8">
                      <input type="email" id="email" placeholder="Your Email" class="form-control">
                  
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-xs-offset-3 col-xs-6">
                      <input type="submit" id="submit" value="Subscribe" class="btn btn-info btn-lg">
                      
                  
                  </div>
              </div>
          
          </form>
          
          <div class="row">
              <!--facebook button-->
              <div class="col-sm-offset-3 col-sm-2">
                  <div class="fb-like" data-href="https://completewebdevelopmentcourse.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
              
              </div>
              <!--G+ button-->
              <div class="col-sm-2">
                    <div class="g-plusone" data-size="medium"></div>    
              </div>
              <!--Twitter button-->
              <div class="col-sm-2">
                  <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://completewebdevelopmentcourse.com">Tweet</a>
              </div>
          </div>
          
          <!--Twitter timeline-->
          <div>
               <a class="twitter-timeline" href="https://twitter.com/Learn_OpenDoors" data-widget-id="659188207645495297" data-chrome="nofooter noborders" data-tweet-limit="3">Tweets by @Learn_OpenDoors</a>
 
          </div>
      </div>

      <!--Google+-->
      <script src="https://apis.google.com/js/platform.js" async defer></script>
      <!--Twitter-->
      <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>