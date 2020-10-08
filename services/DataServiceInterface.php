<?php

    interface DataServiceInterface
    {
        public function Get(string $id): object;
        public function GetAll();

//        public function AddAuthor(string $name): void;
        public function AddConflict(string $name): void;
        public function AddEvent(
          string $date,
          string $markerID,
          array $location,
          string $text,
          string $cssClass,
          string $conflictID,
          string $countryID,
          string $sourceID
        ): void;
        public function AddMarker(string $name): void;
        public function AddNation(
          string $name,
          string $status,
          string $government,
          string $party,
          string $headOfGovernment
        ): void;
        public function AddPublisher(string $name): void;
        public function AddSource(string $type, string $author, string $title, string $publisher, string $date): void;
//        public function AddSourceType(string $type): void;
//        public function GetAllAuthors(): array;
//        public function GetAuthor(string $id): array;
        public function GetAllConflicts(): array;
        public function GetConflict(string $id): array;
        public function GetAllEvents(): array;
        public function GetEvent(string $id): array;
        public function GetEventsByDate(string $date): array;
        public function GetAllMarkers(): array;
        public function GetMarker(string $id): array;
        public function GetAllNations(): array;
        public function GetNation(string $id): array;
        public function GetAllPublishers(): array;
        public function GetPublisher(string $id): array;
        public function GetAllSources(): array;
        public function GetSource(string $id): array;
//        public function GetAllSourceTypes(): array;
//        public function GetSourceType(string $id): array;
    }
