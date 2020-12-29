<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Event.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

    class EventsService extends DataService
    {
        /**
         * Add new Event to the events collection and returns the event id
         *
         * @param Event $newEvent
         *
         * @return string
         */
        public function Add(Event $newEvent): string {
            try
            {
                $newEvent->id = Uuid::uuid4()->toString();

                $collection = $this->GetCollection("Events");
                $insertOneResult = $collection->insertOne($newEvent);

                return $insertOneResult->getInsertedId();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Event failed: " . $e->getMessage();
            }

            return "Internal Server Error";
        }

        /**
         * Gets all Events from the events collection
         *
         * @return array
         */
        public function GetAll(): ?array
        {
            try
            {
                $collection = $this->GetCollection("Events");

                $jm = new JsonMapper();
                return $jm->mapArray($collection->find()->toArray(), array(), "Event");
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all MapEvents failed: " . $e->getMessage();
            }

            return null;
        }

        /**
         * Gets an array of Events by Date from the map_events table
         *
         * @param string $date
         *
         * @return array
         */
        public function GetByDate(string $date): ?array
        {
            try
            {
                $collection = $this->GetCollection("Events");

                $jm = new JsonMapper();
                //TODO: Test return value with no result
                return $jm->mapArray($collection->find(['date' => $date])->toArray(), array(), "Event");
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting MapEvents by date failed: " . $e->getMessage();
            }

            return null;
        }

        /**
         * Gets an Event by ID from the events collection
         *
         * @param string $id
         *
         * @return Event
         */
        public function Get(string $id): ?Event
        {
            try
            {
                $collection = $this->GetCollection("Events");

                $jm = new JsonMapper();
                return $jm->map($collection->findOne(['_id' => $id]), new Event());
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Event failed: " . $e->getMessage();
            }

            return null;
        }
    }
