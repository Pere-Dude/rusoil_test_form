<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Mail\Event;

class QuarterInfo extends CBitrixComponent
{
    private function getResult()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            Event::send(array(
                "EVENT_NAME" => "NEW_APPLICATION_EMAIL",
                "LID" => "s1",
                "C_FIELDS" => array(
                    "HEADING" => $_POST["heading"],
                    "CATEGORY" => $_POST["category"],
                    "APP_TYPE" => $_POST["app_type"],
                    "STOCK" => $_POST["stock"],
                    "BRAND" => $_POST["brand"],
                    "NAME" => $_POST["name"],
                    "COUNT" => $_POST["amount"],
                    "PACKING" => $_POST["packing"],
                    "CLIENT" => $_POST["client"],
                    "COMMENT" => $_POST["comment"]
                ),
            ));
        }
    }

    public function executeComponent()
    {
        $this->getResult();
        $this->includeComponentTemplate();
    }
}