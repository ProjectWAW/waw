<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/MapEvent.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

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
         *
         * @return \MapEvent
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
        ): MapEvent {
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

                $id = Uuid::uuid4();

                $newEvent = new MapEvent();
                $newEvent->id = $id;
                $newEvent->date = $date;
                $newEvent->marker = Uuid::fromstring($markerID);
                $newEvent->location = json_encode($location, JSON_THROW_ON_ERROR);
                $newEvent->text = $text;
                $newEvent->cssClass = $cssClass;
                $newEvent->conflict = Uuid::fromstring($conflictID);
                $newEvent->country = Uuid::fromstring($countryID);
                $newEvent->source = Uuid::fromstring($sourceID);

                $statement->bindParam(':id', $newEvent->id);
                $statement->bindParam('date', $newEvent->date);
                $statement->bindParam('marker', $newEvent->marker);
                $statement->bindParam('location', $newEvent->location);
                $statement->bindParam('text', $newEvent->text);
                $statement->bindParam('css_class', $newEvent->cssClass);
                $statement->bindParam('conflict', $newEvent->conflict);
                $statement->bindParam('country', $newEvent->country);
                $statement->bindParam('source', $newEvent->source);
                $statement->execute();

                return $newEvent;
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
