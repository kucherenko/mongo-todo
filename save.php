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
$body = @file_get_contents('php://input');
file_put_contents('/tmp/test',$body);
echo $body;