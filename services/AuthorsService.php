<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Author.php";

    class AuthorsService extends DataService
    {
        /**
         * Adds a new Author to the authors table
         *
         * @param string $name
         */
        public function Add(string $name): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO authors (id, name) VALUES (:id, :name)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('name', $name);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Author failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Authors in the authors table
         *
         * @return array
         */
        public function GetAll(): array
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                return $conn->query("SELECT * FROM authors")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'Author');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Authors failed: " . $e->getMessage();
            }
        }

        /**
         * Gets an Author by ID from the authors table
         *
         * @param string $id
         *
         * @return Author
         */
        public function Get(string $id): Author
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM authors WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('Author');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Author failed: " . $e->getMessage();
            }
        }
    }
