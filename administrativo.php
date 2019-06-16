<?php 
  session_start();
  require_once("processa/conexao.php");
?>
<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="assets/css/starter-template.css" rel="stylesheet">
  <title>Painel Admin</title>
</head>
  <body>
    <div class="container">
      <?php
        require_once("menu_admin.php");

        $pag[1] = "bem_vindo.php";
        $pag[2] = "listar_usuario.php";
        $pag[3] = "cadastrar_usuario.php";
        $pag[4] = "visualizar_usuario.php";
        $pag[5] = "editar_usuario.php";
        $pag[6] = "excluir_usuario.php";
        $pag[7] = "recuperar_senha.php";

        if(isset($_GET['link'])){
          $link = $_GET['link'];
          if(file_exists($pag[$link])){
            if($pag[$link] == 7){
              $pag[7];
            }else{
              require_once($pag[$link]);
            }
          }else{
            require_once("bem_vindo.php");
          }
        }else{
            require_once("bem_vindo.php");
        }

      ?>
    </div>
    <!-- Optional JavaScript -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous">
    </script>
    <script 
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
      crossorigin="anonymous">
    </script>
    <script 
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
      crossorigin="anonymous">
    </script>
  </body>
  </html>