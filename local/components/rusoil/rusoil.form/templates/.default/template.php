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
            <div class="form-input form-input-line">
                <label class="red-label"><?= Loc::getMessage('BRAND') ?></label>
                <select name="brand">
                    <option value="Нет"><?= Loc::getMessage('CHOOSE_BRAND') ?></option>
                    <?php
                    foreach ($arResult['BRANDS'] as $arKey => $arItem): ?>
                        <option value="<?= $arItem ?>"><?= $arItem ?></option>
                    <?php endforeach; ?>
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