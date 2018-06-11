<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;


// buscando todos os clientes
$app->get('/api/clientes', function(Request $request, Response $response){
    $sql = 'SELECT * FROM cli';
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $clie = $stmt->fetchAll(PDO::FETCH_OBJ); // retornando um array
        $db = null;
        echo json_encode($clie);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
    
    
});
