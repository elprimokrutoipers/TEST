<!DOCTYPE html>
<html>
  <head>
    <title>Авторизация</title>
    <link rel="stylesheet" href="autorization.css">
  </head>
  <body>
    <div class="form-container">
    <form action="login.php" method="post">
       <div class="close-button">&#10006;</div>
       <h1>Авторизация</h1>
       <label for="email">Email:</label>
       <input type="email" id="email" name="email" required><br><br>
       <label for="password">Пароль:</label>
       <input type="password" id="password" name="password" required><br><br>
       <input type="submit" value="Войти">
     </form>
   </div>
   <script>
     document.querySelector('.close-button').addEventListener('click', function() {
       location.href = 'main_page.php';
     });
   </script>
 </body>
</html>