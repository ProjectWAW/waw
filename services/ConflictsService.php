<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Conflict.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

    class ConflictsService extends DataService
    {
        /**
         * Adds a new Conflict to the conflicts table
         *
         * @param string $name
         *
         * @return \Conflict
         */
        public function Add(string $name): Conflict
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO conflicts (id, name) VALUES (:id, :name)");

                $id = Uuid::uuid4();

                $newConflict = new Conflict();
                $newConflict->id = $id;
                $newConflict->name = $name;

                $statement->bindParam(':id', $newConflict->id);
                $statement->bindParam('name', $newConflict->name);
                $statement->execute();

                return $newConflict;
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Conflict failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Conflicts from the conflicts table
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

                return $conn->query("SELECT * FROM conflicts")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'Conflict');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Conflicts failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a Conflict by ID from the conflicts table
         *
         * @param string $id
         *
         * @return Conflict
         */
        public function Get(string $id): Conflict
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM conflicts WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('Conflict');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Conflict failed: " . $e->getMessage();
            }
        }
    }
