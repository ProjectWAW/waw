<?php

    include "../models/SourceType.php";

    class SourceTypesDataService extends DataService
    {
        /**
         * Adds a new SourceType to the source_types table
         *
         * @param string $type
         */
        public function Add(string $type): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO source_types (id, type) VALUES (:id, :type)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam(':type', $type);
                $statement->execute();
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
                return $statement->fetch(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'SourceType');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting SourceType failed: " . $e->getMessage();
            }
        }
    }
