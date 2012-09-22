<?php
/**
 * Save information from todos frontend
 *
 * User: Andrey Kucherenko
 * Date: 19.09.12
 * Time: 14:12
 * File: todo.php
 *
 * @author Andrey Kucherenko <andrey@kucherenko.org>
 *
 */
require_once 'bootstrap.php';

$requestMethod = getenv('REQUEST_METHOD');
$requestBody = @file_get_contents('php://input');
$response = '';

if (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
    $requestMethod = $_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'];
}
/** @var \Doctrine\ODM\MongoDB\DocumentManager $dm */

switch ($requestMethod) {
    case 'POST':
        $task = json_decode($requestBody, true);
        $taskObject = new \Documents\Task();
        $taskObject->setTitle($task['title']);
        $taskObject->setDone($task['done']);
        $taskObject->setOrder($task['order']);
        $dm->persist($taskObject);
        $dm->flush();
        $task['id'] = $taskObject->getId();
        $response = json_encode($task);
        break;

    case 'PUT':
        $task = json_decode($requestBody, true);
        /** @var \Documents\Task $taskObject  */
        $taskObject = $dm->find('Documents\Task', $task['id']);

        if (!is_null($taskObject)) {
            $taskObject->setTitle($task['title']);
            $taskObject->setDone($task['done']);
            $taskObject->setOrder($task['order']);
        }
        $dm->persist($taskObject);
        $dm->flush();

        $response = json_encode($task);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        /**
         * Query for remove task with $id
         */
        /** @var \Documents\Task $taskObject  */
        $query = $dm->createQueryBuilder('Documents\Task')
            ->remove()
            ->field('id')
            ->equals($id)
            ->getQuery()
            ->execute();
        $response = '{}';
        break;

    default:
    case 'GET':
        /**
         * Get all tasks from MongoDB
         */
        $tasks = $dm->createQueryBuilder('Documents\Task')->getQuery()->execute();
        $todos = array();
        foreach ($tasks as $task) {
            /** @var \Documents\Task $task*/
            $todos[] = array(
                'id' => $task->getId(),
                'title' => $task->getTitle(),
                'done' => $task->getDone(),
                'order' => $task->getOrder(),
            );
        }
        $response = json_encode($todos);
        break;
}
echo $response;