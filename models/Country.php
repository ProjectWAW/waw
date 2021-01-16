<?php

    use MongoDB\BSON\Serializable;

    class Country implements Serializable
    {
        public string $_id;
        public string $name;
        public string $government;
        public string $headOfState;
        public string $headOfGovernment;
        public string $party;
        public string $status;
        public string $capital;

        public function bsonSerialize()
        {
            return [
                "_id" => $this->_id,
                "name" => $this->name,
                "government" => $this->government,
                "headOfState" => $this->headOfState,
                "headOfGovernment" => $this->headOfGovernment,
                "party" => $this->party,
                "status" => $this->status,
                "capital" => $this->capital
            ];
        }
    }
