<?php

    require_once __DIR__ . "/../config.php";
    require_once SITE_ROOT . "/services/DataService.php";
    require_once SITE_ROOT . "/models/Country.php";
    require_once SITE_ROOT . "/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;

    class CountriesService extends DataService
    {
        /**
         * Adds a new Country to the countries collection and returns the country id
         *
         * @param Country $newCountry
         *
         * @return string
         */
        public function Add(Country $newCountry): string
        {
            try
            {
                $newCountry->id = Uuid::uuid4()->toString();

                $collection = $this->GetCollection("Countries");
                $insertOneResult = $collection->insertOne($newCountry);

                return $insertOneResult->getInsertedId();
            }
            catch (Exception $e)
            {
                // log error
                echo "Adding Country failed: " . $e->getMessage();
            }

            return "Internal Server Error";
        }

        /**
         * Gets all Countries in the countries collection
         *
         * @return array
         */
        public function GetAll(): ?array
        {
            try
            {
                $collection = $this->GetCollection("Countries");

                $jm = new JsonMapper();
                return $jm->mapArray($collection->find()->toArray(), array(), "Country");
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting all Countries failed: " . $e->getMessage();
            }

            return null;
        }

        /**
         * Gets a Country by ID from the countries collection
         *
         * @param string $id
         *
         * @return Country
         */
        public function Get(string $id): ?Country
        {
            try
            {
                $collection = $this->GetCollection("Countries");

                $jm = new JsonMapper();
                return $jm->map($collection->findOne(['_id' => $id]), new Country());
            }
            catch (Exception $e)
            {
                // log error
                echo "Getting Country failed: " . $e->getMessage();
            }

            return null;
        }
    }
