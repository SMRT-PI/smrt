<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST" action="uploadTeste.php">
            <input type="file" name="arquivo[]" multiple="multiple" /><br><br>
            <input name="enviar" type="submit" value="Enviar" />
        </form>
    </body>
</html>
