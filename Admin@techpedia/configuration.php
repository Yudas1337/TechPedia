<?php

class configuration
{
    private $server     = "localhost";
    private $username   = "finvmwbq_techpedia";
    private $password   = "Exorcism1337";
    private $database   = "finvmwbq_techpedia";
    protected $db;

    function __construct()
    {
        $this->connect_database();
    }

    protected function connect_database()
    {
        $this->db = new mysqli($this->server, $this->username, $this->password, $this->database);

        if (!$this->db) {

            die("Gagal terhubung ke database! " . $this->db->connect_error());
        }
    }
}
