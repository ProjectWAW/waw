<?php

    use MongoDB\BSON\Serializable;

    class Event implements Serializable
    {
        public string $_id;
        public string $conflict;
        public string $country;
        public string $cssClass;
        public string $date;
        public array $location;
        public string $marker;
        public int $pageWeight;
        public string $source;
        public string $text;

        public function bsonSerialize(): array
        {
            return [
                "_id" => $this->_id,
                "conflict" => $this->conflict,
                "country" => $this->country,
                "cssClass" => $this->cssClass,
                "date" => $this->date,
                "location" => $this->location,
                "marker" => $this->marker,
                "pageWeight" => $this->pageWeight,
                "source" => $this->source,
                "text" => $this->text
            ];
        }
    }
