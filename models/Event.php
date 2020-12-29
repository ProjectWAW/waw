<?php

    use MongoDB\BSON\Persistable;

    class Event implements Persistable
    {
        public string $id;
        public string $date;
        public string $marker;
        public string $location;
        public string $text;
        public string $cssClass;
        public string $conflict;
        public string $country;
        public string $source;

        public function bsonSerialize(): array
        {
            return [
                "_id" => $this->id,
                "date" => $this->date,
                "marker" => $this->marker,
                "location" => $this->location,
                "text" => $this->text,
                "cssClass" => $this->cssClass,
                "conflict" => $this->conflict,
                "country" => $this->country,
                "source" => $this->source
            ];
        }

        public function bsonUnserialize(array $data): void
        {
            // Nothing needs to happen here
        }

    }
