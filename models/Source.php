<?php

    use Ramsey\Uuid\UuidInterface;

    class Source
    {
        public UuidInterface $id;
        public UuidInterface $type;
        public UuidInterface $author;
        public string $title;
        public UuidInterface $publisher;
        public string $date;
    }
