<?php

    include('DataServiceInterface.php');

    class DataService implements DataServiceInterface
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
        private function TryConnect(): ?PDO
        {
            try
            {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbUsername, $this->dbPass);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
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
         * Adds a new Conflict to the conflicts table
         *
         * @param string $name
         */
        public function AddConflict(string $name): void
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
                echo "DB connection failed: " . $e->getMessage();
            }
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
         */
        public function AddEvent(
          string $date,
          string $markerID,
          array $location,
          string $text,
          string $cssClass,
          string $conflictID,
          string $countryID
        ): void {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO map_events (
                        id, date, marker, location, text, css_class, conflict, country
                        ) VALUES (:id, :date, :marker, :location, :text, :css_class, :conflict, :country)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('date', $date);
                $statement->bindParam('marker', $markerID);
                $statement->bindParam('location', $location);
                $statement->bindParam('text', $text);
                $statement->bindParam('css_class', $cssClass);
                $statement->bindParam('conflict', $conflictID);
                $statement->bindParam('country', $countryID);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "DB connection failed: " . $e->getMessage();
            }
        }

        /**
         * Adds a new Marker to the markers table
         *
         * @param string $name
         */
        public function AddMarker(string $name): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO markers (id, name) VALUES (:id, :name)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('name', $name);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "DB connection failed: " . $e->getMessage();
            }
        }

        /**
         * Adds a new Nation to the countries table
         *
         * @param string $name
         */
        public function AddNation(string $name): void
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO countries (id, name) VALUES (:id, :name)");

                $id = uniqid('', true);

                $statement->bindParam(':id', $id);
                $statement->bindParam('name', $name);
                $statement->execute();
            }
            catch (Exception $e)
            {
                // log error
                echo "DB connection failed: " . $e->getMessage();
            }
        }
    }
