<?php

    require_once __DIR__ . "/../config.php";
    require_once __DIR__ . '/DataServiceInterface.php';

    use MongoDB\Client;
    use MongoDB\Database;

    abstract class DataService implements DataServiceInterface
    {
        private string $host;

        /**
         * DataService constructor.
         */
        public function __construct()
        {
            $this->host = config["host"];
        }

        /**
         * Tries to establish DB connection, logs an exception and returns null if unable
         *
         * @return \MongoDB\Database|null
         */
        public function TryConnect(): ?Database
        {
            try
            {
                $db = (new Client($this->host))->waw;

                if (!$db) {
                    throw new \RuntimeException("Database connection is Null");
                }

                return $db;
            }
            catch (\MongoDB\Exception\Exception $e)
            {
                //TODO: Add logging
                echo "DB Connection Failed: " . $e->getMessage();
            }
            catch (\RuntimeException $e)
            {
                //TODO: Add logging
                echo "DB Connection Failed: " . $e->getMessage();
            }

            return null;
        }
    }
