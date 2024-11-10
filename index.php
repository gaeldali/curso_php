<?php
   
    const API_URL="https://whenisthenextmcufilm.com/api";
    #inicializar una nueva sesion de curl;
    $ch=curl_init(API_URL);
    //Indicar que queremos recibir el estado de la peticion 
    // y no mostrar la misma en pantalla
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     /*Ejecutar la peticion y guardamos el resultado */

    $result=curl_exec($ch);

    //alternativa seria utilizar file_get_contents
    //$result= file_get_contents(API_URL); //si solo quieres hacer una get a una api



    $data=json_decode($result, true);    

    //cerrar la conexion
    curl_close($ch);
    //que tiene la peticion API
    


?>
<head>
    <title>La proxima pelicula de marvel</title>
    <meta name="description" content="La proxima pelicula de marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
       <img src="<?= $data["poster_url"]; ?>"
        width="250" 
        alt="Poster de <? $data ?>"
        style="border-radius: 16px"/>
    </section>
    <hgroup>
        <h3><?= $data["title"]?> <br> se estrena en <?= $data["days_until"]; ?> dias </h3>
        <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }
    body{
        text-align: center;
        margin: 0 auto;
    }
</style>