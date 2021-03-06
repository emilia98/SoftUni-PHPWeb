<?php

namespace Content;

use User\User;

class Question
{
    const TITLE_MIN_LENGTH = 3;
    const BODY_MIN_LENGTH = 10;

    /**
     * @var int
     */
    private static $lastId = 0;

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $body;
    /**
     * @var User
     */
    private $author;
    /**
     * @var Answer[]
     */
    private $answers = [];

    public function __construct(string $title,
                                string $body,
                                User $author)
    {
        $this->id = ++self::$lastId;
        // We should use the setters,
        // so we can use the validations we've created
        $this->setTitle($title);
        $this->setBody($body);
        $this->setAuthor($author);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle(string $title) : void
    {
        if(strlen($title) < self::TITLE_MIN_LENGTH) {
            throw new \Exception("The title is too short!");
        }

        $this->title = $title;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setBody(string $body) : void
    {
        if(strlen($body) < self::BODY_MIN_LENGTH) {
            throw new \Exception("The body is too short!");
        }
        $this->body = $body;
    }

    public function getBody() : string
    {
        return $this->body;
    }

    public function setAuthor(User $author) : void
    {
        $this->author = $author;
    }

    public function getAuthor() : User
    {
        return $this->author;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function answer(Answer $answer)
    {
        $this->answers[] = $answer;
    }
}