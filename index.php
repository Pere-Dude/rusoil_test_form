<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Новая заявка");
?>

    <div>
        <?php $APPLICATION->IncludeComponent(
            "rusoil:rusoil.form",
            "",
            array()
        ); ?>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>