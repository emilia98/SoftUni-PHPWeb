<?php

class Forum
{
    private $usersById = []; // User[]
    private $usersByUsername = []; // User[]
    private $questions = []; // Question[]
    private $answers = []; // Answer[]
    private $comments = []; // Answer[]

    private $currentUser; // User

    public function start()
    {
       while(true){
           $line = trim(fgets(STDIN));
           $tokens = explode(" ", $line);

           $commandName = $tokens[0];

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
                   fwrite(STDOUT, "Wrong command");
                   break;
               }
           }
       }
    }

    public function register(string $username, string $password)
    {
        if(array_key_exists($username, $this->usersByUsername)){
            throw new Exception("User already exists!");
        }

        $user = new User($username, $password);
        $this->usersByUsername[$username] = $user;
        $this->usersById[$user->getId()] = $user;

    }

    public function login(string $username, string $password)
    {
        if(array_key_exists($username, $this->usersByUsername) === false){
            throw new Exception("This username doesn't exist!");
        }

        $user = $this->usersByUsername[$username];
        $userPassword = $this->usersByUsername[$username]->getPassword();

        if($password !== $userPassword) {
            throw new Exception("The password is incorrect!");
        }

        $this->currentUser = $user;
    }

    public function ask(string $title, string $body)
    {

    }

    public function answer(int $questionId, string $body)
    {

    }

    public function comment(int $answerId, string $body)
    {

    }

    public function show()
    {

    }
}