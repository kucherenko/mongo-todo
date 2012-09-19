<?php
/**
 * Task model for ODM
 *
 * User: Andrey Kucherenko
 * Date: 19.09.12
 * Time: 14:38
 * File: Task.php
 *
 * @author Andrey Kucherenko <andrey@kucherenko.org>
 *
 */
namespace Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * Task class declaration
 * @ODM\Document
 */
class Task
{
    /**
     * Task identifier
     * @var string
     * @ODM\Id
     */
    private $id;

    /**
     * Task title
     * @var string
     * @ODM\String
     */
    private $title;

    /**
     * order position
     * @var \DateTime
     * @ODM\Date
     */
    private $order;

    /**
     * Status of task
     * @ODM\Boolean
     */
    private $done;

}