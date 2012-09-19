<?php
/**
 * Save information from
 *
 * User: Andrey Kucherenko
 * Date: 19.09.12
 * Time: 14:12
 * File: server.php
 *
 * @author Andrey Kucherenko <andrey@kucherenko.org>
 *
 */
require_once 'bootstrap.php';

use Documents\Task;

$requestMethod = getenv('REQUEST_METHOD');
if ($requestMethod === 'POST') {
    $requestBody = @file_get_contents('php://input');
    $dataArray = json_decode($requestBody, true);
    foreach ($dataArray as $task) {
        $taskModel = new Task();
        $taskModel->setId($task['id']);
        $taskModel->setTitle($task['title']);
        $taskModel->setDone($task['done']);
        $taskModel->setOrder($task['order']);
        $dm->persist($taskModel);
        $dm->flush();
    }
} else {
    print '<h1>Error</h1>';
}

