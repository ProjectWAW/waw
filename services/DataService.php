<?php

    include('DataServiceInterface.php');

    abstract class DataService implements DataServiceInterface
    {
        private string $host;
        private string $dbname;
        private string $dbUsername;
        private string $dbPass;

        /**
         * DataService constructor.
         *
         * @param string $host
         * @param string $dbname
         * @param string $dbUsername
         * @param string $dbPass
         */
        public function __construct(string $host, string $dbname, string $dbUsername, string $dbPass)
        {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->dbUsername = $dbUsername;
            $this->dbPass = $dbPass;
        }

        /**
         * Tries to establish DB connection, logs an exception and returns null if unable
         *
         * @return \PDO|null
         */
        public function TryConnect(): ?PDO
        {
            try
            {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbUsername, $this->dbPass);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            }
            catch (PDOException $e)
            {
                //logSomeError("Something is off" . mysqli_connect_error());
                echo "DB Connection Failed: " . $e->getMessage();
            }

            return null;
        }
    }
