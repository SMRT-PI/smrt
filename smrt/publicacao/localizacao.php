<!DOCTYPE html>
<html>
<body>
<p id="demo">Localização:</p>
<button onclick="getLocation()">Obtenha aqui!</button>
<div id="mapholder"></div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU&callback=initMap"
  type="text/javascript"></script>

<!--  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7xO0yzbGdqeO7caYCe1PDDwzMw6TphtU&callback=initMap">
    </script>-->
  
<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocalização não é suportada nesse browser.";}
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
</body>
</html>
