<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Envio de Email</title>
</head>

<body class="d-flex justify-content-center">
  <form action="envio.php" id="form" method="POST" class="mt-5 w-25">
  <h4>Envio de Email(PHPMailer)</h4>
    <div class="form-group">
      <input type="text" class="form-control" required name="nome" placeholder="Nome:">
    </div>
    <div class="form-group">
      <input type="email" name="email" required class="form-control" placeholder="Email:">
    </div>
    <div class="form-group">
      <textarea type="text" class="form-control" name="msg" placeholder="Menssagem:"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
  </form>
</body> 
</html>



<!-- <script>
 swal({
			title: 'Email Encaminhado Com Sucesso',
			text: 'test',
			type: 'success',
      allowOutsideClick: false
		});
</script> -->



<script>
  //Caso ocorra um double click o formulário não será encaminhado duas vezes
  $(document).ready(function() {
    jQuery('form').preventDoubleSubmit();

  jQuery.fn.preventDoubleSubmit = function() {
    jQuery(this).submit(function() {
      if (this.beenSubmitted)
        return false;
      else
        this.beenSubmitted = true;
    });
  };

  });
</script>