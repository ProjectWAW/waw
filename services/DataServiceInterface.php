<?php

    interface DataServiceInterface
    {
        public function AddConflict(string $name): void;
        public function AddEvent(
          string $date,
          string $markerID,
          array $location,
          string $text,
          string $cssClass,
          string $conflictID,
          string $countryID
        ): void;
        public function AddMarker(string $name): void;
        public function AddNation(string $name): void;
        public function GetAllConflicts(): array;
        public function GetConflict(string $id): array;
        public function GetAllEvents(): array;
        public function GetEvent(string $id): array;
        public function GetEventsByDate(string $date): array;
        public function GetAllMarkers(): array;
        public function GetMarker(string $id): array;
        public function GetAllNations(): array;
        public function GetNation(string $id): array;
    }
