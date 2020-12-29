<?php

    use MongoDB\BSON\Serializable;

    class Country implements Serializable
    {
        public string $_id;
        public string $government;
        public string $headOfGovernment;
        public string $name;
        public string $party;
        public string $status;

        public function bsonSerialize()
        {
            return [
                "_id" => $this->_id,
                "government" => $this->government,
                "headOfGovernment" => $this->headOfGovernment,
                "name" => $this->name,
                "party" => $this->party,
                "status" => $this->status
            ];
        }
    }
