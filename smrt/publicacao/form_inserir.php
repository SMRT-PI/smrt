<?php
include_once '../bd/conectar.php';
include '../cabecalho.php';

$Name_autor = $_SESSION['nome'];
?>

<!--Google Maps Localização-->
<script>


    var lat = '';
    var lon = '';
 
    var x = document.getElementById("demo");
    function getLocation()
      {
          if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
          else {
            x.innerHTML = "Geolocalização não é suportada nesse browser."
        }
      }
  
    function showError(error)
      {
          switch (error.code)
            {
                case error.PERMISSION_DENIED:
                      x.innerHTML = "Usuário rejeitou a solicitação de Geolocalização."
                      break;
                case error.POSITION_UNAVAILABLE:
                      x.innerHTML = "Localização indisponível."
                      break;
                case error.TIMEOUT:
                      x.innerHTML = "O tempo da requisição expirou."
                      break;
                case error.UNKNOWN_ERROR:
                      x.innerHTML = "Algum erro desconhecido aconteceu."
                      break;
            }
      }

    function showPosition(position)
      {
          lat = position.coords.latitude;
          lon = position.coords.longitude;

          mapholder = document.getElementById('mapholder');
          mapholder.style.height = '250px';
          mapholder.style.width = '500px';
        mapholder.innerHTML = ('<iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d876.7773817165236!2d' + lon + '!3d' + lat + '!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDI4JzM0LjUiUyA0OcKwMDEnMzQuNiJX!5e0!3m2!1spt-BR!2sbr!4v1539659561200" width="600" height="450" frameborder="0" style="border:0;width:100%;height:100%;" allowfullscreen></iframe>');

        document.getElementById("lat").value = lat;
        document.getElementById("lon").value = lon;

          /*
         var latlon=new google.maps.LatLng(lat, lon)
           var myOptions={
           center:latlon,zoom:14,
           mapTypeId:google.maps.MapTypeId.ROADMAP,
           mapTypeControl:false,
           navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
           };
           var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
           var marker=new google.maps.Marker({position:latlon,map:map,title:"Minha localização!"});
         */
      }

//CHAVE API GOOGLE MAPS - AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU

</script>

<!--Google Maps Localização-->



<div class="container">

    <!--    Mapa-->    
    <div class="col-md-6 offset-md-3 mt-5 mb-5">  
        <div class="row mt-3 mb-3">
            <div id="mapholder" style="margin:0 auto;"></div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <button class="btn btn-primary float-right" onclick="getLocation()">Obtenha a localização aqui!</button>
                <p id="demo"></p>
            </div>
        </div>
        <input type="hidden" name="autor" value="<?= $linha['id'] ?>"/>   

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input class="form-control my-3" type="text" id="lat" name="lat" value="" placeholder="Latitude"/>
                <input class="form-control" type="text" id="lon" name="lon" value="" placeholder="Longitude"/>
            </div>
        </div>
        <!--    Mapa--> 

        <!--    Formulario--> 
        <form method="post" action="inserir.php">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Imagem:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="imagem" />
<!--                    <form enctype="multipart/form-data" method="POST" action="uploadTeste.php">-->
<!--                        <input type="file" name="arquivo[]" multiple="multiple"/><br><br>-->
<!--                    </form>    -->
                        </div>
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Legenda:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" placeholder="Informe a legenda de Publicação" name="legenda"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <input type="submit" name="enviar" class="btn btn-success float-left" value="Enviar" />

                            </div>
                        </div>
                    </form>
                    <!--    Formulario-->
                </div>
            </div>




            <?php
            include '../rodape.php';
            