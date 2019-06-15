function excluirUsuario(){
  $('a.delete').click(function() {

      var id = $(this).prop('id');
      var data = 'id=' + id ;
      
      $('#confirm-delete').modal('show'); 

      $('#confirm-delete').modal().find('.btn-confirmar').on('click', function(){
          $.ajax({
              type: "POST",
              url: "processa/excluir_usuario.php",
              data: data,
              cache: false,
              success: function(response) {
                $('#confirm-delete').modal('hide');
                $('#btnConfirmar').prop("disabled", true);
                $('tr#'+id).remove();
              }
          });
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
  fecharMSGSuccess();
  fecharMSGDanger();
  fecharMSGWarning();
}

