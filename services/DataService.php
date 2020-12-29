<?php

    require_once __DIR__ . "/../config.php";
    require_once __DIR__ . '/DataServiceInterface.php';

    use MongoDB\Client;
    use MongoDB\Collection;
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
        private function TryConnect(): ?Database
        {
            try
            {
                $db = (new Client($this->host))->waw;

                if (!$db) {
                    throw new RuntimeException("Database connection is Null");
                }

                return $db;
            }
            catch (\MongoDB\Exception\Exception $e)
            {
                //TODO: Add logging
                echo "DB Connection Failed: " . $e->getMessage();
            }
            catch (RuntimeException $e)
            {
                //TODO: Add logging
                echo "DB Connection Failed: " . $e->getMessage();
            }

            return null;
        }

        /**
         * Get Mongo Collection
         *
         * @param string $collectionName
         *
         * @return \MongoDB\Collection
         */
        public function GetCollection(string $collectionName): Collection
        {
            $db = $this->TryConnect();

            if (!$db)
            {
                throw new RuntimeException("Database Connection is null");
            }

            $collection = $db->selectCollection($collectionName);

            if (!$collection)
            {
                throw new RuntimeException("Database connection cannot be null");
            }

            return $collection;
        }
    }
