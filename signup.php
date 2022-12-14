<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    async
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/semantic-ui@2/dist/semantic.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/semantic-ui-react/dist/umd/semantic-ui-react.min.js"></script>
  <title>BUT APP</title>
</head>
<body>

  <?php 
  session_start();

  if(sizeof($_SESSION)!=0){
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === true){
    header("location: index.php");
    exit;
    }
  }
  

  ?>

  <form action="php/newUser.php" method="post" class="ui form">
    <div class="field">
      <label>Identifiant</label>
      <input type="text" name="username" placeholder="..." required>
    </div>
    <div class="field">
      <label>Mot de passe</label>
      <input type="password" name="password" placeholder="..." required>
    </div>
    <div class="field">
      <label>Confirmer mot de passe</label>
      <input type="password" name="confirmPassword" placeholder="..." required>
    </div>
    <button style="width: 100%; margin: auto;" class="ui button" type="submit">S'inscrire</button>
  </form>
    
  <div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
</body>
</html>

<style> 

body {
    margin: auto;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    overflow: auto;
    background: linear-gradient(315deg, rgba(255,174,25,1) 3%, rgba(255,252,50,1) 38%, rgba(255,100,25,1) 68%, rgba(255,25,25,1) 98%);
    animation: gradient 15s ease infinite;
    background-size: 400% 400%;
    background-attachment: fixed;
}

@keyframes gradient {
    0% {
        background-position: 0% 0%;
    }
    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0% 0%;
    }
}

.wave {
    background: rgb(255 255 255 / 25%);
    border-radius: 1000% 1000% 0 0;
    position: fixed;
    width: 200%;
    height: 12em;
    animation: wave 10s -3s linear infinite;
    transform: translate3d(0, 0, 0);
    opacity: 0.8;
    bottom: 0;
    left: 0;
    z-index: -1;
}

.wave:nth-of-type(2) {
    bottom: -1.25em;
    animation: wave 18s linear reverse infinite;
    opacity: 0.8;
}

.wave:nth-of-type(3) {
    bottom: -2.5em;
    animation: wave 20s -1s reverse infinite;
    opacity: 0.9;
}

@keyframes wave {
    2% {
        transform: translateX(1);
    }

    25% {
        transform: translateX(-25%);
    }

    50% {
        transform: translateX(-50%);
    }

    75% {
        transform: translateX(-25%);
    }

    100% {
        transform: translateX(1);
    }
}

label{
  color: white;
}

form{
  padding: 30px;
  border-radius: 32px;
  background-color: #8C92AC;
  width: 20%;
  margin:auto;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  box-shadow: 0px 0px 50px 5px #fff;
}

.ui.form input[type=text]:focus, .ui.form input[type=password]:focus{
  border-color: #cac98f;
}

@media screen and (max-width: 1200px) {
  form{
    width: 50%;
  }
}
@media screen and (max-width: 1000px) {
  form{
    width: 70%;
  }
}

form a {
  margin-top: 15px;
  display: block;
  color: black;
  text-align: center;
}
</style>