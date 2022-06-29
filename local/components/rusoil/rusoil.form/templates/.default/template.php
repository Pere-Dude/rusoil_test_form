<?php
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$contribution = $arResult["PRICE"] * $arResult["CONTRIBUTION"] / 100;
?>

<div class="float-page">
    <form action="<?= POST_FORM_ACTION_URI ?>" method="post">
        <span class="form-heading"><?= Loc::getMessage('HEADING') ?></span>
        <div class="form-cell">
            <span class="form-label"><?= Loc::getMessage('NEW_APP') ?></span><br>
            <input type="text" name="heading" class="float-text">
        </div>

        <span class="form-heading"><?= Loc::getMessage('CATEGORY') ?></span>
        <div class="form-cell">
            <input type="radio" name="category"
                   value="Масла, автохимия, фильтры, Автоаксесуары, обогшреватели, запчасти, сопутствующие товары">
            <label>Масла, автохимия, фильтры, Автоаксесуары, обогшреватели, запчасти, сопутствующие товары</label><br>
            <input type="radio" name="category" value="Шины, диски">
            <label>Шины, диски</label><br>
        </div>

        <span class="form-heading"><?= Loc::getMessage('APP_TYPE') ?></span>
        <div class="form-cell">
            <input type="radio" name="app_type" value="Запрос цены и сроков поставки">
            <label>Запрос цены и сроков поставки</label><br>
            <input type="radio" name="app_type" value="Пополнение складов">
            <label>Пополнение складов</label><br>
            <input type="radio" name="app_type" value="Спецзаказ">
            <label>Спецзаказ</label><br>
        </div>

        <span class="form-heading"><?= Loc::getMessage('STOCK') ?></span>
        <div class="form-cell">
            <select name="stock">
                <option value="Нет">(выберите склад поставки)</option>
                <option value="ул.Дзержинского 115">ул.Дзержинского 115</option>
                <option value="ул.Шаболовка 301д">ул.Шаболовка 301д</option>
            </select>
        </div>

        <span class="form-heading"><?= Loc::getMessage('APP_COMPOUND') ?></span>
        <div class="form-cell form-cell-app">
            <div class="form-input form-input-line">
                <label class="red-label"><?= Loc::getMessage('BRAND') ?></label>
                <select name="brand">
                    <option value="Нет"><?= Loc::getMessage('CHOOSE_BRAND') ?></option>
                    <option value="Mobil">Mobil</option>
                    <option value="Lukoil">Lukoil</option>
                </select>
            </div>
            <div class="form-cell form-cell-inputs">
                <div class="form-input hidden">
                    <label class="red-label"><?= Loc::getMessage('NAME') ?></label>
                    <input type="text" name="name" class="float-text">
                </div>
                <div class="form-input hidden">
                    <label class="red-label"><?= Loc::getMessage('AMOUNT') ?></label>
                    <input type="text" name="amount" class="float-text">
                </div>
                <div class="form-input hidden">
                    <label class="red-label"><?= Loc::getMessage('PACKING') ?></label>
                    <input type="text" name="packing" class="float-text">
                </div>
                <div class="form-input hidden">
                    <label class="red-label"><?= Loc::getMessage('CLIENT') ?></label>
                    <input type="text" name="client" class="float-text">
                </div>
                <div class="form-cell-control">
                    <span class="form-cell-button plus">+</span>
                    <span class="form-cell-button minus">-</span>
                </div>
            </div>
        </div>

        <div class="form-cell">
            <input type="file" id="" class="float-text">
        </div>

        <div class="form-cell">
            <span class="form-label-comment"><?= Loc::getMessage('COMMENT') ?></span>
            <br>
            <textarea class="form-textarea" name="comment"></textarea>
        </div>

        <button><?= Loc::getMessage('SEND') ?></button>

    </form>
</div>
