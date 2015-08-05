<?php
    class Place
    {
        private $name;
        private $duration;
        private $image;

        function __construct($name, $duration, $image)
        {
            $this->name = $name;
            $this->duration = $duration;
            $this->image = $image;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setDuration($new_duration)
        {
            $this->duration = (string) $new_duration;
        }

        function getDuration()
        {
            return $this->duration;
        }

        function setImage($new_image)
        {
            $this->image = $new_image;
        }

        function getImage()
        {
            return $this->image;
        }

        function save()
        {
            array_push($_SESSION['list_of_places'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_places'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_places'] = array();
        }
    }
?>
