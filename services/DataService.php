<?php

    include('DataServiceInterface.php');
    include('../models/Conflict.php');

    // TODO: Convert to a smaller services
    abstract class DataService implements DataServiceInterface
    {
        private string $host;
        private string $dbname;
        private string $dbUsername;
        private string $dbPass;

        /**
         * DataService constructor.
         *
         * @param string $host
         * @param string $dbname
         * @param string $dbUsername
         * @param string $dbPass
         */
        public function __construct(string $host, string $dbname, string $dbUsername, string $dbPass)
        {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->dbUsername = $dbUsername;
            $this->dbPass = $dbPass;
        }

        /**
         * Tries to establish DB connection, logs an exception and returns null if unable
         *
         * @return \PDO|null
         */
        public function TryConnect(): ?PDO
        {
            try
            {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbUsername, $this->dbPass);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conn;
            }
            catch (PDOException $e)
            {
                //logSomeError("Something is off" . mysqli_connect_error());
                echo "DB Connection Failed: " . $e->getMessage();
            }

            return null;
        }

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
        public function AddEvent(
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
        public function GetAllEvents(): array
        {
            // TODO: Implement GetAllEvents() method.
        }

        /**
         * Gets an Event by ID from the map_events table
         *
         * @param string $id
         *
         * @return array
         */
        public function GetEvent(string $id): array
        {
            // TODO: Implement GetEvent() method.
        }

        /**
         * Gets an array of Events by Date from the map_events table
         *
         * @param string $date
         *
         * @return array
         */
        public function GetEventsByDate(string $date): array
        {
            // TODO: Implement GetEventsByDate() method.
        }
    }
