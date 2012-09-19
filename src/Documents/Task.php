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
     * @var int
     * @ODM\Int
     */
    private $order;

    /**
     * Status of task
     * @ODM\Boolean
     */
    private $done;

    public function setDone($done)
    {
        $this->done = $done;
    }

    public function getDone()
    {
        return $this->done;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return \DateTime
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

}