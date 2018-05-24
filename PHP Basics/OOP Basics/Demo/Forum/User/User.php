<?php
namespace User;

use Content\Answer;
use Content\Question;

class User
{
    private static $lastId = 0;

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var Question[]
     */
    private $questions = [];
    /**
     * @var Answer[]
     */
    private $answers = [];
    /**
     * @var Answer[]
     */
    private $comments = [];

    public function __construct(string $username, string $password)
    {
        $this->id = ++self::$lastId;
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        if(!preg_match("/[0-9]+/", $password)){
            throw new \Exception("The password should contain digits!");
        }

        if(!preg_match("/[a-z]+/", $password)){
            throw new \Exception("The password should contain lowercase letters!");
        }

        $this->password = $password;
        return false;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function askQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function answer(Answer $answer, Question $question)
    {
        $this->answers[] = $answer;
        $question->answer($answer);
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function addComment(Answer $comment, Answer $answer)
    {
        $this->comments[] = $comment;
        $answer->comment($comment);
    }
}