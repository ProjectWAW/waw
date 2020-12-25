<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Source.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use MongoDB\Collection;
    use Ramsey\Uuid\Uuid;

    class SourcesService extends DataService
    {

        /**
         * Add a new Source document to the sources collection and returns the document id
         *
         * @param Source $newSource
         *
         * @return string
         */
        public function Add(Source $newSource): string
        {
            try
            {
                $newSource->_id = Uuid::uuid4()->toString();

                $collection = $this->GetCollection("Sources");
                $insertOneResult = $collection->insertOne($newSource);

                return $insertOneResult->getInsertedId();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding SourceType failed: " . $e->getMessage();
            }

            return "Internal Server Error";
        }

        /**
         * Gets all Sources from the sources collection
         *
         * @return array
         */
        public function GetAll(): ?array
        {
            try
            {
                $collection = $this->GetCollection("Sources");

//                return $collection->find()->toArray();

                $jm = new JsonMapper();
                return $jm->mapArray($collection->find()->toArray(), array(), "Source");
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Sources failed: " . $e->getMessage();
            }

            return null;
        }

        /**
         * Gets a Source by ID from the sources collection
         *
         * @param string $id
         *
         * @return Source
         */
        public function Get(string $id): ?Source
        {
            try
            {
                $collection = $this->GetCollection("Sources");

                $jm = new JsonMapper();
                return $jm->
                    map($collection->findOne(['_id' => $id]), new Source());
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Source failed: " . $e->getMessage();
            }

            return null;
        }

        /**
         * Get Mongo Collection
         *
         * @param string $collectionName
         *
         * @return \MongoDB\Collection
         */
        public function GetCollection(string $collectionName): Collection
        {
            $db = $this->TryConnect();

            if (!$db)
            {
                throw new \RuntimeException("Database Connection is null");
            }

            $collection = $db->selectCollection($collectionName);

            if (!$collection)
            {
                throw new \RuntimeException("Database connection cannot be null");
            }

            return $collection;
        }
    }
