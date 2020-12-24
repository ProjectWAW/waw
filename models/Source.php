<?php

    use Ramsey\Uuid\UuidInterface;

    class Source
    {
        public string $_id;
        public string $author;
        public DateTime $accessed;
        public DateTime $publishDate;
        public string $publisher;
        public string $title;
        public string $type;
        public string $url;
    }
