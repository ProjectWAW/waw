<?php

    include "DataService.php";
    include "../models/Conflict.php";

    class ConflictsService extends DataService
    {
        /**
         * Adds a new Conflict to the conflicts table
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

                $statement = $conn->prepare("INSERT INTO conflicts (id, name) VALUES (:id, :name)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('name', $name);
                $statement->execute();
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
