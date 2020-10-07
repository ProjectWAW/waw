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
    }
