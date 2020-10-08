<?php

    include "DataService.php";
    include "../models/Country.php";

    class CountriesService extends DataService
    {
        /**
         * Adds a new Country to the countries table
         *
         * @param string $name
         * @param string $status
         * @param string $government
         * @param string $party
         * @param string $headOfGovernment
         */
        public function Add(
          string $name,
          string $status,
          string $government,
          string $party,
          string $headOfGovernment
        ): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO countries (
                       id,
                       name,
                       status,
                       government,
                       party,
                       head_of_government
                       ) VALUES (:id, :name, :status, :government, :party, :headOfGovernment)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('name', $name);
                $statement->bindParam('status', $status);
                $statement->bindParam('government', $government);
                $statement->bindParam('party', $party);
                $statement->bindParam('headOfGovernment', $headOfGovernment);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Country failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Countries in the countries table
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

                return $conn->query("SELECT * FROM countries")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'Country');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Countries failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a Country by ID from the countries table
         *
         * @param string $id
         *
         * @return Country
         */
        public function Get(string $id): Country
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM countries WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('Country');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Country failed: " . $e->getMessage();
            }
        }
    }
