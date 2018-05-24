<?php



use Content\Answer;
use Content\Question;
use User\User;

class Forum
{
    /**
     * @var User[]
    */
    private $usersById = [];
    /**
     * @var User[]
     */
    private $usersByUsername = [];
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
    /**
     * @var User
     * **/
    private $currentUser;

    public function start()
    {
       while(true){
           $line = trim(fgets(STDIN));
           $tokens = explode(" ", $line);

           $commandName = $tokens[0];

           try {
               switch ($commandName){
                   case 'register': {
                       $username = $tokens[1];
                       $password = $tokens[2];
                       $this->register($username, $password);
                       break;
                   }
                   case 'login': {
                       $username = $tokens[1];
                       $password = $tokens[2];
                       $this->login($username, $password);
                       break;
                   }
                   case 'ask': {
                       $title = $tokens[1];
                       $body = $tokens[2];
                       $this->ask($title, $body);
                       break;
                   }
                   case 'answer': {
                       $questionId = intval($tokens[1]);
                       $body = $tokens[2];
                       $this->answer($questionId, $body);
                       break;
                   }
                   case 'comment': {
                       $answerId = intval($tokens[1]);
                       $body = $tokens[2];
                       $this->comment($answerId, $body);
                       break;
                   }
                   case 'show': {
                       $this->show();
                       break;
                   }
                   default: {
                       fwrite(STDOUT, "Wrong command\n");
                       break;
                   }
               }
           } catch(Exception $e) {
               echo PHP_EOL . $e->getMessage() . PHP_EOL;
           }

       }
    }

    public function register(string $username, string $password)
    {
        if(array_key_exists($username, $this->usersByUsername)){
            throw new \Exception("User already exists!");
        }

        $user = new User($username, $password);
        $this->usersByUsername[$username] = $user;
        $this->usersById[$user->getId()] = $user;
    }

    public function login(string $username, string $password)
    {
        if(array_key_exists($username, $this->usersByUsername) == false){
            throw new \Exception("This username doesn't exist!");
        }

        $user = $this->usersByUsername[$username];
        $userPassword = $this->usersByUsername[$username]->getPassword();

        if($password !== $userPassword) {
            throw new \Exception("The password is incorrect!");
        }

        $this->currentUser = $user;
    }

    public function ask(string $title, string $body)
    {
        if($this->currentUser == null) {
            throw new \Exception("Cannot ask questions, if you are not logged in!");
        }

        $question = new Question($title, $body, $this->currentUser);
        $this->questions[$question->getId()] = $question;

        // $this->currentUser->askQuestion($question);
    }

    public function answer(int $questionId, string $body)
    {
        if($this->currentUser == null) {
            throw new \Exception("Cannot ask questions, if you are not logged in!");
        }

        if(!array_key_exists($questionId, $this->questions)){
            throw new \Exception("This question does not exist!");
        }
        $question = $this->questions[$questionId];
        $answer =  new Answer($body, $this->currentUser, $question);
        $this->answers[$answer->getId()] = $answer;
        $question->answer($answer);

        // $this->currentUser->answer($answer, $question);
    }

    public function comment(int $answerId, string $body)
    {
        if($this->currentUser == null) {
            throw new \Exception("Cannot comment questions, if you are not logged in!");
        }

        if(!array_key_exists($answerId, $this->answers)){
            throw new \Exception("This answer does not exist!");
        }

        $answer = $this->answers[$answerId];
        $question = $answer->getQuestion();
        $comment = new Answer($body, $this->currentUser, $question, $answer);
        $this->comments[$comment->getId()] = $comment;
        $answer->comment($answer);

        // $this->currentUser->addComment($comment, $answer);
    }

    public function show()
    {
        foreach ($this->questions as  $question) {
            echo " -- Title: ".$question->getTitle() . PHP_EOL;
            echo " -- Body: ".$question->getBody() . PHP_EOL;
            echo " -- Author: ".$question->getAuthor()->getUsername() . PHP_EOL;
            echo " -- Answers: " . PHP_EOL;

            foreach ($question->getAnswers() as $answer) {
                echo "    --- Body: ".$answer->getBody() . PHP_EOL;
                echo "    --- Author: ".$answer->getAuthor()->getUsername() . PHP_EOL;

                foreach ($answer->getComments() as $comment) {
                    echo "      ---- Body: ".$comment->getBody() . PHP_EOL;
                    echo "      ---- Author: ".$comment->getAuthor()->getUsername(). PHP_EOL;
                }
            }
        }
    }
}