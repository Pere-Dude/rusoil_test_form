<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CModule::IncludeModule("iblock");
use Bitrix\Main\Mail\Event;

class QuarterInfo extends CBitrixComponent
{
    private function getResult()
    {
        $cartegory_id = \TestConfigs\Config::getIblock('category');
        $arSelect = Array("ID", "NAME");
        $arFilter = Array("IBLOCK_ID" => $cartegory_id, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $this->arResult['CATEGORY'][$arFields['ID']] = $arFields['NAME'];
        }

        $app_type = \TestConfigs\Config::getIblock('app_type');
        $arFilter = Array("IBLOCK_ID" => $app_type, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $this->arResult['APP_TYPE'][$arFields['ID']] = $arFields['NAME'];
        }

        $stock = \TestConfigs\Config::getIblock('stock');
        $arFilter = Array("IBLOCK_ID" => $stock, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $this->arResult['STOCK'][$arFields['ID']] = $arFields['NAME'];
        }

        $brands = \TestConfigs\Config::getIblock('brands');
        $arFilter = Array("IBLOCK_ID" => $brands, "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $this->arResult['BRANDS'][$arFields['ID']] = $arFields['NAME'];
        }



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_FILES['file']){
                $fileId = \CFile::SaveFile($_FILES['file'],"mailatt");
            }
            Event::send(array(
                "EVENT_NAME" => "NEW_APPLICATION_EMAIL",
                "LID" => "s1",
                "C_FIELDS" => array(
                    "HEADING" => $_POST["heading"],
                    "CATEGORY" => $_POST["category"],
                    "APP_TYPE" => $_POST["app_type"],
                    "STOCK" => $_POST["stock"],

                    "BRAND1" => $_POST["brand1"],
                    "NAME1" => $_POST["name1"],
                    "COUNT1" => $_POST["amount1"],
                    "PACKING1" => $_POST["packing1"],
                    "CLIENT1" => $_POST["client1"],
                    "COMMENT1" => $_POST["comment1"],

                    "BRAND2" => $_POST["brand2"],
                    "NAME2" => $_POST["name2"],
                    "COUNT2" => $_POST["amount2"],
                    "PACKING2" => $_POST["packing2"],
                    "CLIENT2" => $_POST["client2"],
                    "COMMENT2" => $_POST["comment2"],

                    "BRAND3" => $_POST["brand3"],
                    "NAME3" => $_POST["name3"],
                    "COUNT3" => $_POST["amount3"],
                    "PACKING3" => $_POST["packing3"],
                    "CLIENT3" => $_POST["client3"],
                    "COMMENT3" => $_POST["comment3"],

                    "BRAND4" => $_POST["brand4"],
                    "NAME4" => $_POST["name4"],
                    "COUNT4" => $_POST["amount4"],
                    "PACKING4" => $_POST["packing4"],
                    "CLIENT4" => $_POST["client4"],
                    "COMMENT4" => $_POST["comment4"],

                    "BRAND5" => $_POST["brand5"],
                    "NAME5" => $_POST["name5"],
                    "COUNT5" => $_POST["amount5"],
                    "PACKING5" => $_POST["packing5"],
                    "CLIENT5" => $_POST["client5"],
                    "COMMENT5" => $_POST["comment5"],

                    "BRAND6" => $_POST["brand6"],
                    "NAME6" => $_POST["name6"],
                    "COUNT6" => $_POST["amount6"],
                    "PACKING6" => $_POST["packing6"],
                    "CLIENT6" => $_POST["client6"],
                    "COMMENT6" => $_POST["comment6"],

                    "BRAND7" => $_POST["brand7"],
                    "NAME7" => $_POST["name7"],
                    "COUNT7" => $_POST["amount7"],
                    "PACKING7" => $_POST["packing7"],
                    "CLIENT7" => $_POST["client7"],
                    "COMMENT7" => $_POST["comment7"],

                    "BRAND8" => $_POST["brand8"],
                    "NAME8" => $_POST["name8"],
                    "COUNT8" => $_POST["amount8"],
                    "PACKING8" => $_POST["packing8"],
                    "CLIENT8" => $_POST["client8"],
                    "COMMENT8" => $_POST["comment8"],

                    "BRAND9" => $_POST["brand9"],
                    "NAME9" => $_POST["name9"],
                    "COUNT9" => $_POST["amount9"],
                    "PACKING9" => $_POST["packing9"],
                    "CLIENT9" => $_POST["client9"],
                    "COMMENT9" => $_POST["comment9"],

                    "BRAND10" => $_POST["brand10"],
                    "NAME10" => $_POST["name10"],
                    "COUNT10" => $_POST["amount10"],
                    "PACKING10" => $_POST["packing10"],
                    "CLIENT10" => $_POST["client10"],
                    "COMMENT10" => $_POST["comment10"],
                ),
                "FILE" => array($fileId),
            ));
        }
    }

    public function executeComponent()
    {
        $this->getResult();
        $this->includeComponentTemplate();
    }
}