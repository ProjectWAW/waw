<?php

    use Ramsey\Uuid\UuidInterface;

    class Country
    {
        public UuidInterface $id;
        public string $name;
        public string $status;
        public string $government;
        public string $party;
        public string $headOfGovernment;
    }
