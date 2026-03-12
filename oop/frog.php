<?php

    require_once("animal.php");

    class Frog extends Animal {

        public function jump($hop) {

            return "hop $hop";

        }

    }

?>