<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Publisher.php";

    class PublishersService extends DataService
    {
        /**
         * Add a new Publisher to the publishers table
         *
         * @param string $name
         */
        public function AddPublisher(string $name): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO publishers (id, name) VALUES (:id, :name)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam(':name', $name);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Publisher failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Publishers from the publishers table
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

                return $conn->query("SELECT * FROM publishers")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'Publisher');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Publishers failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a Publisher by ID from the publishers table
         *
         * @param string $id
         *
         * @return Publisher
         */
        public function Get(string $id): ?Publisher
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM publishers WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();

                $result = $statement->fetchObject('Publisher');

                if (is_bool($result))
                {
                    return null;
                }

                return $result;
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Publisher failed: " . $e->getMessage();
            }
        }
    }
