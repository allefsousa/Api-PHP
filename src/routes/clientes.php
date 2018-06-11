<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;


// Delete Customer
$app->delete('/api/clientes/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "DELETE FROM cli WHERE id = '$id';";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "cliente deletado"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

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


$app->get('/api/clientes/{id}', function(Request $request, Response $response){


    $id = $request->getAttribute('id');
    if(!empty($id)){

   
        $sql = "SELECT * FROM cli WHERE id = '$id';";
        try{
            // Get DB Object
            $db = new db();
            // Connect
            $db = $db->connect();
            $stmt = $db->query($sql);
            $customer = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            echo json_encode($customer);
        } catch(PDOException $e){
            echo '{"error": {"text": '.$e->getMessage().'}';
        }
    }
});

// Add Cliente
$app->post('/api/clientes/add', function(Request $request, Response $response){
    $clinome = $request->getParam('nome');
    $clisobrenome = $request->getParam('sobrenome');
    $clitelefone = $request->getParam('telefone');
    $cliemail = $request->getParam('email');
    $cliendereco = $request->getParam('endereco');
    $clicidade = $request->getParam('cidade');
    $cliestado = $request->getParam('estado');
    $sql = "INSERT INTO cli (nome,sobrenome,telefone,email,endereco,cidade,estado) VALUES
    (:nome,:sobrenome,:telefone,:email,:endereco,:cidade,:estado)";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $clinome);
        $stmt->bindParam(':sobrenome',  $clisobrenome);
        $stmt->bindParam(':telefone',      $clitelefone);
        $stmt->bindParam(':email',      $cliemail);
        $stmt->bindParam(':endereco',    $cliendereco);
        $stmt->bindParam(':cidade',       $clicidade);
        $stmt->bindParam(':estado',      $cliestado);
        $stmt->execute();
        echo '{"Msg": {"text": "Cliente Adicionado"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


