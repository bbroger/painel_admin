function excluirUsuario(){
  $('a.delete').click(function() {

        var id = $(this).prop('id');
        var btn = $('.btnExcluir').prop('name');
      
      $('#confirm-delete').modal('show'); 

      $('#confirm-delete').modal().find('.btn-confirmar').on('click', function(){
          $.ajax({
              type: "POST",
              url: "processa/excluir_usuario.php",
              data: {'id':id, 'btn':btn},
              cache: false,
              success: function() {
                $('#btnConfirmar').prop("disabled", true);
                $('#confirm-delete').modal('hide');
                $('tr#'+id).remove();
              }
          });
          window.location.replace("administrativo.php?link=2")
      });
  });
}

function excluirCategoria(){
  $('a.delete_categoria').click(function() {

        var id = $(this).prop('id');
        var btn = $('.btnExcluir').prop('name');
      
      $('#confirm-delete').modal('show'); 

      $('#confirm-delete').modal().find('.btn-confirmar').on('click', function(){
          $.ajax({
              type: "POST",
              url: "processa/excluir_categoria.php",
              data: {'id':id, 'btn':btn},
              cache: false,
              success: function() {
                $('#btnConfirmar').prop("disabled", true);
                $('#confirm-delete').modal('hide');
                $('tr#'+id).remove();
              }
          });
          window.location.replace("administrativo.php?link=9")
      });
  });
}

function fecharMSGSuccess(){
  $(".alert-success").delay(3000).slideUp(200, function() {
      $(this).alert('close');
  });
}

function fecharMSGDanger(){
  $(".alert-danger").delay(3000).slideUp(200, function() {
      $(this).alert('close');
  });
}

function fecharMSGWarning(){
  $(".alert-warning").delay(3000).slideUp(200, function() {
      $(this).alert('close');
  });
}

window.onload = function() {
  excluirUsuario();
  excluirCategoria();
  fecharMSGSuccess();
  fecharMSGDanger();
  fecharMSGWarning();
}

