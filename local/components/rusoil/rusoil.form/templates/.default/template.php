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
?>

<div class="float-page">
    <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">
        <span class="form-heading"><?= Loc::getMessage('HEADING') ?></span>
        <div class="form-cell">
            <span class="form-label"><?= Loc::getMessage('NEW_APP') ?></span><br>
            <input type="text" name="heading" class="float-text" required>
        </div>

        <span class="form-heading"><?= Loc::getMessage('CATEGORY') ?></span>
        <div class="form-cell">
            <?php
            foreach ($arResult['CATEGORY'] as $arKey => $arItem): ?>
            <input type="radio" name="category" value="<?= $arItem ?>" id="category<?= $arKey ?>" required>
            <label for="category<?= $arKey ?>"><?= $arItem ?></label><br>
            <?php endforeach; ?>
        </div>

        <span class="form-heading"><?= Loc::getMessage('APP_TYPE') ?></span>
        <div class="form-cell">
            <?php
            foreach ($arResult['APP_TYPE'] as $arKey => $arItem): ?>
                <input type="radio" name="app_type" value="<?= $arItem ?>" id="app_type<?= $arKey ?>" required>
                <label for="app_type<?= $arKey ?>"><?= $arItem ?></label><br>
            <?php endforeach; ?>
        </div>

        <span class="form-heading"><?= Loc::getMessage('STOCK') ?></span>
        <div class="form-cell">
            <select name="stock">
                <option value="Нет">(выберите склад поставки)</option>
                <?php
                foreach ($arResult['STOCK'] as $arKey => $arItem): ?>
                    <option value="<?= $arItem ?>"><?= $arItem ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <span class="form-heading"><?= Loc::getMessage('APP_COMPOUND') ?></span>
        <div class="form-cell form-cell-app">
            <table class="form-table">
                <tr>
                    <td><label class="red-label"><?= Loc::getMessage('BRAND') ?></label></td>
                    <td><label class="red-label"><?= Loc::getMessage('NAME') ?></label></td>
                    <td><label class="red-label"><?= Loc::getMessage('AMOUNT') ?></label></td>
                    <td><label class="red-label"><?= Loc::getMessage('PACKING') ?></label></td>
                    <td><label class="red-label"><?= Loc::getMessage('CLIENT') ?></label></td>
                </tr>
                <tr class="table-line">
                    <td><select name="brand1" class="brand">
                            <option value="Нет"><?= Loc::getMessage('CHOOSE_BRAND') ?></option>
                            <?php
                            foreach ($arResult['BRANDS'] as $arKey => $arItem): ?>
                                <option value="<?= $arItem ?>"><?= $arItem ?></option>
                            <?php endforeach; ?>
                        </select></td>
                    <td><input type="text" name="name1" class="float-text name"></td>
                    <td><input type="number" name="amount1" min="1" class="float-text amount"></td>
                    <td><input type="text" name="packing1" class="float-text packing"></td>
                    <td><input type="text" name="client1" class="float-text client"></td>
                </tr>
            </table>
            <div class="form-cell-control">
                <span class="form-cell-button plus">+</span>
                <span class="form-cell-button minus">-</span>
            </div>
        </div>

        <div class="form-cell">
            <input type="file" name="file" class="float-text">
        </div>

        <div class="form-cell">
            <span class="form-label-comment"><?= Loc::getMessage('COMMENT') ?></span>
            <br>
            <textarea class="form-textarea" name="comment"></textarea>
        </div>

        <button><?= Loc::getMessage('SEND') ?></button>

    </form>
</div>