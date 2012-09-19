<?php
/**
 * Save information from
 *
 * User: Andrey Kucherenko
 * Date: 19.09.12
 * Time: 14:12
 * File: save.php
 *
 * @author Andrey Kucherenko <andrey@kucherenko.org>
 *
 */

require_once 'bootstrap.php';
$requestMethod = getenv('REQUEST_METHOD');
if ($requestMethod === 'POST') {
    $requestBody = @file_get_contents('php://input');
    $dataArray = json_decode($requestBody, true);
    foreach ($dataArray as $task) {

    }
} else {
    print '<h1>Error</h1>';
}

