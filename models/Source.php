<?php

    use MongoDB\BSON\Persistable;
    use MongoDb\BSON\UTCDateTime;

    class Source implements Persistable
    {
        public string $id;
        public string $author;
        public DateTime $accessDate;
        public DateTime $publishDate;
        public string $publisher;
        public string $title;
        public string $type;
        public string $url;

        public function bsonSerialize(): array
        {
            return [
                "_id" => $this->id,
                "author" => $this->author,
                "accessDate" => new MongoDate($this->accessDate),
                "publishDate" => new MongoDate($this->publishDate),
                "publisher" => $this->publisher,
                "title" => $this->title,
                "type" => $this->type,
                "url" => $this->url
            ];
        }

        public function bsonUnserialize(array $data): void
        {
            if (!isset($data["accessDate"]) || !$data["accessDate"] instanceof UTCDateTime)
            {
                throw new RuntimeException("Expected 'accessDate' field to be a UTCDateTime");
            }

            if (!isset($data["publishDate"]) || !$data["accessDate"] instanceof UTCDateTime)
            {
                throw new RuntimeException("Expected 'publishDate' field to be a UTCDateTime");
            }

            $this->accessDate = new DateTIme($data["accessDate"]);
            $this->publishDate = new DateTime($data["publishDate"]);
        }
    }
