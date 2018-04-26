<?php 
$msg = '';
$msgClass = '';
if(filter_has_var(INPUT_POST, 'submit')){
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  if(!empty($email) && !empty($name) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $msg = 'Please use a valid email fields';
      $msgClass = 'alert-danger';  
    } else {
    $toEmail = 'nathaniel@nathanbud.com';
$subject =  'Contact Request From' .$name;
$body = '<h2>Contact Request</h2>
         <h4>Name</h4><p>'.$name.'</p>
         <h4>Name</h4><p>'.$email.'</p>
         <h4>Name</h4><p>'.$message.'</p>';
         $headers = "MIME-Version: 1.0" ."\r\n";
         $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
         $headers .= "From: ".$name. "<".$email.">". "\r\n";
         if(mail($toEmail,$subject,$body,$headers)){
             $msg = 'Message sent';        
         }else{
             $msg = 'Message NOT sent';
         }
  }
  }else {
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-danger';
  } 
}   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <fieldset>
    <legend>Basic Contact Form</legend>
    <div class="form-group">
      <input type="text" name="name" class="form-control"  placeholder="Full Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
    </div>
    <div class="form-group">
      <input type="text" name="email" class="form-control"  placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" >
    </div>
    <div class="form-group">
      <textarea type="text" name="message" class="form-control" placeholder="Message" rows="3" value="<?php echo isset($_POST['message']) ? $message : ''; ?>"></textarea>
    </div>
    <div class="form-group">
    <?php if($msg !=''): ?>
      <div class="alert <?php echo $msgClass; ?>">
        <?php echo $msg; ?></div>
    <?php  endif; ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
</body>
</html>

</div>

