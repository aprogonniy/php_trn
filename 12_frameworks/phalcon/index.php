<?php

$di = new \Phalcon\DI\FactoryDefault();

// Настройка сервиса базы данных
$di->set('db', function () {
    return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
        "host" => "localhost",
        "username" => "asimov",
        "password" => "zeroth",
        "dbname" => "robotics"
    ));
});

$app = new \Phalcon\Mvc\Micro($di);

// Получение всех роботов
$app->get('/api/robots', function () use ($app) {

    $phql = "SELECT * FROM Robots ORDER BY name";
    $robots = $app->modelsManager->executeQuery($phql);

    $data = array();
    foreach ($robots as $robot) {
        $data[] = array(
            'id' => $robot->id,
            'name' => $robot->name,
        );
    }

    echo json_encode($data);
});

// Поиск роботов, в названии которых содержится $name
$app->get('/api/robots/search/{name}', function ($name) use ($app) {

    $phql = "SELECT * FROM Robots WHERE name LIKE :name: ORDER BY name";
    $robots = $app->modelsManager->executeQuery($phql, array(
        'name' => '%' . $name . '%'
    ));

    $data = array();

    foreach ($robots as $robot) {
        $data[] = array(
            'id' => $robot->id,
            'name' => $robot->name,
        );
    }

    echo json_encode($data);

});

// Получение робота по ключу
$app->get('/api/robots/{id:[0-9]+}', function ($id) use ($app) {

    $phql = "SELECT * FROM Robots WHERE id = :id:";
    $robot = $app->modelsManager->executeQuery($phql, array(
        'id' => $id
    ))->getFirst();

    //Create a response
    $response = new Phalcon\Http\Response();

    if ($robot == false) {
        $response->setJsonContent(array('status' => 'NOT-FOUND'));
    } else {
        $response->setJsonContent(array(
            'status' => 'FOUND',
            'data' => array(
                'id' => $robot->id,
                'name' => $robot->name
            )
        ));
    }

    return $response;
});

// Добавление нового робота
$app->post('/api/robots', function () use ($app) {

    $robot = $app->request->getJsonRawBody();

    $phql = "INSERT INTO Robots (name, type, year) VALUES (:name:, :type:, :year:)";

    $status = $app->modelsManager->executeQuery($phql, array(
        'name' => $robot->name,
        'type' => $robot->type,
        'year' => $robot->year
    ));

    // Формируем ответ
    $response = new Phalcon\Http\Response();

    //Проверка, что вставка произведена успешно
    if ($status->success() == true) {

        // Изменение HTML статуса
        $response->setStatusCode(201, "Created");

        $robot->id = $status->getModel()->id;

        $response->setJsonContent(array('status' => 'OK', 'data' => $robot));

    } else {

        // Изменение HTML статуса
        $response->setStatusCode(409, "Conflict");

        //Отправляем сообщение об ошибке клиенту
        $errors = array();
        foreach ($status->getMessages() as $message) {
            $errors[] = $message->getMessage();
        }

        $response->setJsonContent(array('status' => 'ERROR', 'messages' => $errors));
    }

    return $response;
});

// Обновление робота по ключу
$app->put('/api/robots/{id:[0-9]+}', function ($id) use ($app) {

    $robot = $app->request->getJsonRawBody();

    $phql = "UPDATE Robots SET name = :name:, type = :type:, year = :year: WHERE id = :id:";
    $status = $app->modelsManager->executeQuery($phql, array(
        'id' => $id,
        'name' => $robot->name,
        'type' => $robot->type,
        'year' => $robot->year
    ));

    // Формируем ответ
    $response = new Phalcon\Http\Response();

    // Проверка, что обновление произведено успешно
    if ($status->success() == true) {
        $response->setJsonContent(array('status' => 'OK'));
    } else {

        //Изменение HTML статуса
        $response->setStatusCode(409, "Conflict");

        $errors = array();
        foreach ($status->getMessages() as $message) {
            $errors[] = $message->getMessage();
        }

        $response->setJsonContent(array('status' => 'ERROR', 'messages' => $errors));
    }

    return $response;
});

// Удаление робота по ключу
$app->delete('/api/robots/{id:[0-9]+}', function ($id) use ($app) {

    $phql = "DELETE FROM Robots WHERE id = :id:";
    $status = $app->modelsManager->executeQuery($phql, array(
        'id' => $id
    ));

    // Формируем ответ
    $response = new Phalcon\Http\Response();

    if ($status->success() == true) {
        $response->setJsonContent(array('status' => 'OK'));
    } else {

        // Изменение HTTP статуса
        $response->setStatusCode(409, "Conflict");

        $errors = array();
        foreach ($status->getMessages() as $message) {
            $errors[] = $message->getMessage();
        }

        $response->setJsonContent(array('status' => 'ERROR', 'messages' => $errors));

    }

    return $response;
});