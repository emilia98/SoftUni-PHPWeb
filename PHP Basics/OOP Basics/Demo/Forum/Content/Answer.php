<?php

namespace Content;
use User\User;

class Answer
{
    const BODY_MIN_LENGTH = 5;

    /**
     * @var int
     */
    public static $lastId = 0;

    /**
     * @var  int
     */
    private $id;
    /**
     * @var string
     */
    private $body;
    /**
     * @var User
    */
    private $author;
    /**
     * @var Question
     * */
    private $question;
    /**
     * @var Answer
    */
    private $answer;
    /**
     * @var Answer[]
     */
    private $comments = [];

    public function __construct(string $body,
                                User $author,
                                Question $question,
                                Answer $answer = null)
    {
        $this->id = ++self::$lastId;
        $this->setBody($body);
        $this->setAuthor($author);
        $this->setQuestion($question);
        $this->setAnswer($answer);
    }

    public function getId() : int
    {
        return $this->id;
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

    public function setQuestion(Question $question) : void
    {
        $this->question = $question;
    }

    public function getQuestion() : Question
    {
        return $this->question;
    }

    public function setAnswer(Answer $answer = null) : void
    {
        $this->answer = $answer;
    }

    public function getAnswer() : Answer
    {
        return $this->answer;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    public function comment(Answer $answer)
    {
        $this->comments[] = $answer;
    }
}