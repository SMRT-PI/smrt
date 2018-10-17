<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU&callback=initMap">
</script>
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


  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Minha localização!"});
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


//CHAVE API GOOGLE MAPS - AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU

</script>
                
            <script type="text/javascript">
               var lat = 'teste';
               var lon = 'teste'; 
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
            
            <?php 
                $lat = "<script>document.write(lat)</script>";
                echo "$lat"; 
                $lon = "<script>document.write(lon)</script>";
                echo "$lon";
            ?>
