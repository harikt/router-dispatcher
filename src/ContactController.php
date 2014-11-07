<?php
class ContactController
{
    protected $post;

    protected $query;

    protected $server;

    public function __construct($post, $query, $server)
    {
        $this->post = $post;
        $this->query = $query;
        $this->server = $server;
    }

    public function getAction()
    {
        echo "I am from get < br/>";
        echo '<form method="post"><input type="text" name="name" /><input type="submit" value="send" /></form>';
    }

    public function postAction()
    {
        echo "I am from post <br />";
        echo htmlentities(isset($this->post['name'])? "You have submitted " . $this->post['name'] : 'No name submitted', ENT_QUOTES, "UTF-8");
    }

    public function __invoke()
    {
        if (strtoupper($this->server['REQUEST_METHOD']) == 'POST') {
            return $this->postAction();
        }

        if (strtoupper($this->server['REQUEST_METHOD']) == 'GET') {
            return $this->getAction();
        }
    }
}
