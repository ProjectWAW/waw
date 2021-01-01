<?php

    use MongoDB\Collection;

    interface DataServiceInterface
    {
        public function Get(string $id): ?object;
        public function GetAll();
        public function GetCollection(string $collectionName): Collection;
    }
