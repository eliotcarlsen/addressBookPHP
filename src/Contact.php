<?php
    class Contact
    {
        private $name;
        private $phone;
        private $email;
        private $street;
        private $city;
        private $state;
        private $zip;
        private $image;


        function __construct($name, $phone, $email, $street, $city, $state, $zip, $image)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->street = $street;
            $this->city = $city;
            $this->state = $state;
            $this->zip = $zip;
            $this->image = $image;

        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function setEmail($new_email)
        {
            $this->email = $new_email;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setStreet($new_street)
        {
            $this->street = $new_street;
        }

        function getStreet()
        {
            return $this->street;
        }

        function setCity($new_city)
        {
            $this->city = $new_city;
        }

        function getCity()
        {
            return $this->city;
        }

        function setState($new_state)
        {
            $this->state = $new_state;
        }

        function getState()
        {
            return $this->state;
        }

        function setZip($new_zip)
        {
            $this->zip = $new_zip;
        }

        function getZip()
        {
            return $this->zip;
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
            array_push($_SESSION['list_of_contacts'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_contacts'] = array();
        }
    }
?>
