<?php
include_once '../usuario/autenticacao.php';
include '../bd/conectar.php';
include_once '../cabecalho.php';
//include_once './localizacao.php';

$sql_pessoa = "select * from usuario where email = '$_SESSION[email]'";
$resultado = mysqli_query($conexao, $sql_pessoa);
$linha = mysqli_fetch_array($resultado);
$lon;
if (estaLogado()) {
    if (adm()) {
        ?>

<!--
<div class="d-flex justify-content-center text-center my-4">-->
  
<!--LOCALIZAÇAO-->
                
<!--<p id="demo">Localização:</p>-->



<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU&callback=initMap"
  type="text/javascript"></script>
  
<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocalização não é suportada nesse browser."}
  }
 
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='250px';
  mapholder.style.width='500px';
//  $lon = lon;

  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Você está Aqui!"});
  }
 
function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Localização indisponível."
      break;
    case error.TIMEOUT:
      x.innerHTML="O tempo da requisição expirou."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Algum erro desconhecido aconteceu."
      break;
    }
  }


//CHAVE - AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU


</script>
                


<div class="container">
   
    <div class="col-md-6 offset-md-3 mt-5 mb-5">  
        <div class="row mt-3 mb-3">
                <div id="mapholder" style="margin:0 auto;"></div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <button class="btn btn-primary float-right" onclick="getLocation()">Obtenha a localização aqui!</button>
            </div>
            
        </div>
        <form action="action" method="post" action="inserir.php">
          <input type="hidden" name="autor" value="<?= $linha['id'] ?>"/>   
            
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Capa:</label>
            <div class="col-sm-10">
              <input class="form-control" id="capa" type="file" name="capa"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="titulo" placeholder="Título"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Conteúdo:</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" placeholder="Conteúdo" name="conteudo"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Descrição:</label>
            <div class="col-sm-10">
             <textarea class="form-control" rows="2" type="text" name="descricao" placeholder="Descrição"></textarea>
            </div>
          </div>
            
          <div class="row">
            <div class="col-md-12 mb-4">
                <button class="btn btn-success float-left" type="submit">Publicar</button>
            </div>
        </div>
        </form>
    </div>
</div>-->

    <?php
    }
} include '../rodape.php';
