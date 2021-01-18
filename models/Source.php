<?php

    use MongoDB\BSON\Serializable;

    class Source implements Serializable
    {
        public string $_id;
        public string $author;
        public string $publishDate;
        public string $publisher;
        public string $title;
        public string $type;
        public string $url;

        public function bsonSerialize(): array
        {
            return [
                "_id" => $this->_id,
                "author" => $this->author,
                "publishDate" => $this->publishDate,
                "publisher" => $this->publisher,
                "title" => $this->title,
                "type" => $this->type,
                "url" => $this->url
            ];
        }
    }
