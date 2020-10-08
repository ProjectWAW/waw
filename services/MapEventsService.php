<?php

    include "DataService.php";
    include "../models/MapEvent.php";

    class MapEventsService extends DataService
    {
        /**
         * Add new Event to the map_events table
         *
         * @param string $date
         * @param string $markerID
         * @param array $location
         * @param string $text
         * @param string $cssClass
         * @param string $conflictID
         * @param string $countryID
         * @param string $sourceID
         */
        public function Add(
          string $date,
          string $markerID,
          array $location,
          string $text,
          string $cssClass,
          string $conflictID,
          string $countryID,
          string $sourceID
        ): void {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO map_events (
                        id, date, marker, location, text, css_class, conflict, country, source
                        ) VALUES (:id, :date, :marker, :location, :text, :css_class, :conflict, :country, :source)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('date', $date);
                $statement->bindParam('marker', $markerID);
                $statement->bindParam('location', $location);
                $statement->bindParam('text', $text);
                $statement->bindParam('css_class', $cssClass);
                $statement->bindParam('conflict', $conflictID);
                $statement->bindParam('country', $countryID);
                $statement->bindParam('source', $sourceID);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Event failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Events from the map_events table
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

                return $conn->query("SELECT * FROM map_events")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'MapEvent');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all MapEvents failed: " . $e->getMessage();
            }
        }

        /**
         * Gets an array of Events by Date from the map_events table
         *
         * @param string $date
         *
         * @return array
         */
        public function GetByDate(string $date): array
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM map_events WHERE date = :date");
                $statement->bindParam(':date', $date);
                $statement->execute();
                return $statement->fetchObject('MapEvent');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting MapEvents by date failed: " . $e->getMessage();
            }
        }

        /**
         * Gets an Event by ID from the map_events table
         *
         * @param string $id
         *
         * @return MapEvent
         */
        public function Get(string $id): MapEvent
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM map_events WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('MapEvent');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting MapEvent failed: " . $e->getMessage();
            }
        }
    }
