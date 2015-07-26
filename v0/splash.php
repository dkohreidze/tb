<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="fonts/Lato2OFLWeb/Lato/Lato-Regular.css"/>   

    <title>Tolerance Break | Writers</title>

    <!-- Bootstrap -->
      <link href="css/splash.css" rel="stylesheet">   
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    <!-- /Bootstrap -->

  </head>
  <style>
    .error {color: #FF0000;}
  </style>
  
  <body>

  <?php
    //import the necessary lib(s)
    require('./libs/db_lib.php');
    // define variables and set to empty values
    $nameErr = $emailErr = "";
    $firstName = $lastName = $email = $sampleArticle = $aboutMe = "";
    $canAddWriter = TRUE;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["firstName"])) {
        $canAddWriter = FALSE;
        $nameErr = "First name is required. However, feel free to omit your last name for anonymity!";
       } else {
         $firstName = test_input($_POST["firstName"]);
         $lastName = test_input($_POST["lastName"]);
      // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$lastName) ) {
           $nameErr = "I may be stoned, but that doesn't look like a name to me...";
           $canAddWriter = FALSE;
         }
       }  
   
     if (empty($_POST["email"])) {
        $emailErr = "Email is required. How else can we keep you posted on what's going on?";
     } else {
       $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailErr = "I may be high, but that doesn't look like an email address...";
         $canAddWriter = FALSE; 
       }else if(email_exists($email)){
         $emailErr = "It looks like we already have this email address in our system, have you applied already?";
         $canAddWriter = FALSE;
       }
     }

     if (empty($_POST["aboutMe"])) {
        $aboutMe = "";
     } else {
        $aboutMe = test_input($_POST["aboutMe"]);
     }

     if (empty($_POST["sampleArticle"])) {
        $sampleArticle = "";
     } else {
        $sampleArticle = test_input($_POST["sampleArticle"]);
     }

     if($canAddWriter){
        if($email && !$emailErr && !$nameErr){
          if(add_writer($email,$firstName,$lastName,$aboutMe,$sampleArticle)){
            echo "Writer Added successfully.";
          }else{
          echo "Failed to add writer.";
          }
        }
      }
     }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tolerance Break</a>
          <div class="navbar-accent" href="#"></div>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav"></ul>
       </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>     

    <div class="container-fluid" id="main-video">
      <video width="100%" height="" autoplay>
        <source src="css/videos/logo_vid1_cropped.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div><!-- /#main-video-->  



    <div class="container-fluid" id="main-image">
      <img src="http://i.imgur.com/hWOavXY.jpg" class="img-responsive" />
      
      <h1>No Seeds. No Stems. No Sticks.<br><em>No Filter.</em></h1>

    </div><!-- /#main-image -->  

    

    <div class="container_fluid" id="info-container">
      <h2>Write For Tolerance Break</h2>

      <ul>
        <li>
          <span class="glyphicon glyphicon-pencil"></span>
          <h3>Why are you here?</h3>
          <p>We are looking for talented and hardworking writers who are down (see 'The Cause'), and we think you might fit the mold. Keep in mind we are looking for well-written and compelling content, so make sure you're up to the task before you apply.</p>
        </li>

        <li>
          <span class="glyphicon glyphicon-bullhorn"></span>
          <h3>The Cause.</h3>
          <p>We are a group of individuals who strive to shed light on the various nuances of cannabis culture, share content we find interesting with our fellow marijuana enthusiasts, and provide a platform for people like you to kick back, spark up, and broadcast your ideas to your community.   </p>
        </li>

        <li>
          <span class="glyphicon glyphicon-circle-arrow-down"></span>
          <h3>Up for the challenge?</h3>
          <p>Still think you've got what it takes to be one of our writers? If you do, we do. Keep scrolling down to apply now.</p>
        </li>

      </ul>
    </div><!-- /#info-container -->


    <div class="container_fluid" id="signup-container">
     
      <h4>Show us what you've got.</h4>

      <div id="signup-form">
        <div id="form">
          <h5>Want to write for us? You're in the right place.</h5>
 
          <form role="form" method="post" action="">
            <div class="form-group">
              <label class="sr-only" for="firstNameInput">First Name</label>
              <input type="text" name="firstName" class="form-control" id="firstNameInput" placeholder="First Name" value="<?php echo $firstName;?>">
              <span class="error"><?php echo $nameErr;?></span>
            </div>
            <div class="form-group">
              <label class="sr-only" for="lastNameInput">Last Name</label>
              <input type="text" name="lastName" class="form-control" id="lastNameInput" placeholder="Last Name" value="<?php echo $lastName;?>">
            </div>
            <div class="form-group">
              <label class="sr-only" for="emailInput">Email Address</label>
              <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email Address" value="<?php echo $email;?>">
              <span class="error"><?php echo $emailErr;?></span>
            </div>
            <div class="form-group">
              <label class="sr-only" for="aboutMeInput">About Me</label>
              <textarea type="text" name="aboutMe" class="form-control" id="aboutMeInput" rows="10" cols="60" 
                placeholder="Tell us a bit about yourself: What are your hobbies/interests? Why should we choose you? Are there any particular sub-topics that are particularly interesting to you?" 
                value="<?php echo $aboutMe;?>"></textarea>
            </div>
            <div class="form-group">
              <label class="sr-only" for="aboutMeInput">Sample Article</label>
              <textarea type="text"  name="sampleArticle" class="form-control" id="sampleArticleInput" rows="20" cols="60" 
              placeholder="Submit a sample article here. Make it good, we only want the best!" value="<?php echo $sampleArticle;?>"></textarea>
            </div>
            <div class="checkbox">
              <label>
                By clicking submit, you agree with the ToleranceBreak <a href="terms.html">terms/conditions</a>.
              </label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div><!-- /#form -->
      </div><!-- /#signup-form --> 

    </div><!-- /#signup-container -->


  </body>
</html>


















