<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/SourceType.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

    class SourceTypesService extends DataService
    {
        /**
         * Adds a new SourceType to the source_types table
         *
         * @param string $type
         *
         * @return \SourceType
         */
        public function Add(string $type): SourceType
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO source_types (id, type) VALUES (:id, :type)");

                $id = Uuid::uuid4();

                $newSourceType = new SourceType();
                $newSourceType->id = $id;
                $newSourceType->type = $type;

                $statement->bindParam(':id', $newSourceType->id);
                $statement->bindParam(':type', $newSourceType->type);
                $statement->execute();

                return $newSourceType;
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding SourceType failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all SourceTypes from the source_types table
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

                return $conn->query("SELECT * FROM source_types")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'SourceType');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all SourceTypes failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a SourceType by ID from the source_types table
         * @param string $id
         *
         * @return SourceType
         */
        public function Get(string $id): SourceType
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM source_types WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('SourceType');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting SourceType failed: " . $e->getMessage();
            }
        }
    }
