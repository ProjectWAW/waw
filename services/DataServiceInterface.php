<?php

    interface DataServiceInterface
    {
        public function Get(string $id): object;
        public function GetAll();
    }
