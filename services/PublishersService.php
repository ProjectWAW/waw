<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Publisher.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

    class PublishersService extends DataService
    {

        /**
         * Add a new Publisher to the publishers table
         *
         * @param string $name
         *
         * @return \Publisher
         */
        public function Add(string $name): Publisher
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO publishers (id, name) VALUES (:id, :name)");

                $id = Uuid::uuid4();

                $newPublisher = new Publisher();
                $newPublisher->id = $id;
                $newPublisher->name = $name;

                $statement->bindParam(':id', $newPublisher->id);
                $statement->bindParam(':name', $newPublisher->name);
                $statement->execute();

                return $newPublisher;
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
