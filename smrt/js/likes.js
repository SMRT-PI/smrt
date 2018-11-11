$(document).ready(function () {
    $(".like").click(function () {
        var id = this.id;//Esta recebendo o (id="") do botão, que neste caso é o id da Pub.
        
        $.ajax({
            url: 'curti.php',
            type: 'POST',
            data: {id:id},
            dataType: 'json',
            
            success:function(data){
                var likes = data['likes'];
                var text = data['text'];
                
                
            }
        });
    });
});