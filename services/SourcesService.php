<?php

    include "DataService.php";
    include "../models/Source.php";

    class SourcesService extends DataService
    {
        /**
         * Add a new Source to the sources table
         *
         * @param string $type
         * @param string $author
         * @param string $title
         * @param string $publisher
         * @param string $date
         */
        public function Add(string $type, string $author, string $title, string $publisher, string $date): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare(
                  "INSERT INTO sources (id, type, author, title, publisher, date)
                            VALUES (:id, :type, :author, :title, :publisher, :date)"
                );

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam(':type', $type);
                $statement->bindParam(':author', $author);
                $statement->bindParam(':title', $title);
                $statement->bindParam(':publisher', $publisher);
                $statement->bindParam(':date', $date);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding SourceType failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Sources from the sources table
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

                return $conn->query("SELECT * FROM sources")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'Source');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Sources failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a Source by ID from the sources table
         *
         * @param string $id
         *
         * @return Source
         */
        public function Get(string $id): Source
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM sources WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('Source');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Source failed: " . $e->getMessage();
            }
        }
    }
