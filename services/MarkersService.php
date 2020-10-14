<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Marker.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

    class MarkersService extends DataService
    {
        /**
         * Adds a new Marker to the markers table
         *
         * @param string $name
         *
         * @return \Marker
         */
        public function Add(string $name): Marker
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("INSERT INTO markers (id, name) VALUES (:id, :name)");

                $id = Uuid::uuid4();

                $newMarker = new Marker();
                $newMarker->id = $id;
                $newMarker->name = $name;

                $statement->bindParam(':id', $newMarker->id);
                $statement->bindParam('name', $newMarker->name);
                $statement->execute();

                return $newMarker;
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Marker failed: " . $e->getMessage();
            }
        }

        /**
         * Gets all Markers from the markers table
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

                return $conn->query("SELECT * FROM markers")
                  ->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_UNIQUE, 'Marker');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Markers failed: " . $e->getMessage();
            }
        }

        /**
         * Gets a Marker by ID from the markers table
         *
         * @param string $id
         *
         * @return Marker
         */
        public function Get(string $id): Marker
        {
            try
            {
                $conn = $this->TryConnect();

                if (!$conn)
                {
                    throw new RuntimeException("Database connection cannot be null");
                }

                $statement = $conn->prepare("SELECT * FROM markers WHERE id = :id");
                $statement->bindParam(':id', $id);
                $statement->execute();
                return $statement->fetchObject('Marker');
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Marker failed: " . $e->getMessage();
            }
        }
    }
