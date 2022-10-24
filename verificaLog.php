
  <?php
    session_start();
    if(!isset($_SESSION['Nombre']))
    {
      echo 
      '<script>
        alert("Necesita iniciar sesion");
        window.location="index.php";
      </script>';
      session_destroy();
      exit();
    }
  ?>