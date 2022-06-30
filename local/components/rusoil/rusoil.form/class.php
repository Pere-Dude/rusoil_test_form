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
                    "BRAND" => $_POST["brand"],
                    "NAME" => $_POST["name"],
                    "COUNT" => $_POST["amount"],
                    "PACKING" => $_POST["packing"],
                    "CLIENT" => $_POST["client"],
                    "COMMENT" => $_POST["comment"]
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