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
      });
  });
}

function excluirUsuario1(){
  $('a.delete1').click(function() {

      var id = $(this).prop('id');
      var btn = $('.btnExcluir').prop('name');
      
      $('#confirm-delete').modal('show'); 

      $('#confirm-delete').modal().find('.btn-confirmar1').on('click', function(){
        $.ajax({
            type: "POST",
            url: "processa/excluir_usuario.php",
            data: {'id':id, 'btn':btn},
            cache: false,
            success: function() {
              $('#btnConfirmar1').prop("disabled", true);
              $('#confirm-delete').modal('hide');
              $('tr#'+id).remove();
            }
        });
        window.location.replace("administrativo.php?link=2")
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
  excluirUsuario1()
  fecharMSGSuccess();
  fecharMSGDanger();
  fecharMSGWarning();
}

