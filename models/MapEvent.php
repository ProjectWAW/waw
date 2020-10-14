<?php

    use Ramsey\Uuid\UuidInterface;

    class MapEvent
    {
        public UuidInterface $id;
        public string $date;
        public UuidInterface $marker;
        public string $location;
        public string $text;
        public string $cssClass;
        public UuidInterface $conflict;
        public UuidInterface $country;
        public UuidInterface $source;
    }
