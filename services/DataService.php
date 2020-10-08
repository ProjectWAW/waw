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
                echo "Adding Conflict failed: " . $e->getMessage();
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
                echo "Adding Marker failed: " . $e->getMessage();
            }
        }

        /**
         * Adds a new Country to the countries table
         *
         * @param string $name
         * @param string $status
         * @param string $government
         * @param string $party
         * @param string $headOfGovernment
         */
        public function AddCountry(
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
         * Add a new Publisher to the publishers table
         *
         * @param string $name
         */
        public function AddPublisher(string $name): void
        {
            // TODO: Implement AddPublisher() method.
        }

        /**
         * Add a new Source to the sources table
         *
         * @param string $type
         * @param string $author
         * @param string $title
         * @param string $publisher
         * @param string $date
         */
        public function AddSource(string $type, string $author, string $title, string $publisher, string $date): void
        {
            // TODO: Implement AddSource() method.
        }

        /**
         * Gets all Conflicts from the conflicts table
         *
         * @return array
         */
        public function GetAllConflicts(): array
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
                echo "DB connection failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a Conflict by ID from the conflicts table
         *
         * @param string $id
         *
         * @return array
         */
        public function GetConflict(string $id): array
        {
            // TODO: Implement GetConflict() method.
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


        /**
         * Gets all Markers from the markers table
         *
         * @return array
         */
        public function GetAllMarkers(): array
        {
            // TODO: Implement GetAllMarkers() method.
        }

        /**
         * Gets a Marker by ID from the markers table
         *
         * @param string $id
         *
         * @return array
         */
        public function GetMarker(string $id): array
        {
            // TODO: Implement GetMarker() method.
        }

        /**
         * Gets all Countries in the countries table
         *
         * @return array
         */
        public function GetAllCountries(): array
        {
            // TODO: Implement GetAllNations() method.
        }

        /**
         * Gets a Country by ID from the countries table
         *
         * @param string $id
         *
         * @return array
         */
        public function GetCountry(string $id): array
        {
            // TODO: Implement GetNation() method.
        }

        /**
         * Gets all Publishers from the publishers table
         *
         * @return array
         */
        public function GetAllPublishers(): array
        {
            // TODO: Implement GetAllPublishers() method.
        }

        /**
         * Gets a Publisher by ID from the publishers table
         *
         * @param string $id
         *
         * @return array
         */
        public function GetPublisher(string $id): array
        {
            // TODO: Implement GetPublisher() method.
        }

        /**
         * Gets all Sources from the sources table
         *
         * @return array
         */
        public function GetAllSources(): array
        {
            // TODO: Implement GetAllSources() method.
        }

        /**
         * Gets a Source by ID from the sources table
         *
         * @param string $id
         *
         * @return array
         */
        public function GetSource(string $id): array
        {
            // TODO: Implement GetSource() method.
        }
    }
