<?php 

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule('iblock'))
    return;

$arFilterIb = array("ACTIVE" => "Y");
$arSortIb = array("SORT" => "ASC");

$arIblockType = CIBlockParameters::GetIBlockTypes();

if (!empty($arCurrentValues["IBLOCK_TYPE"])) {
    $arFilterIb["TYPE"] = $arCurrentValues["IBLOCK_TYPE"];
}

$arIb = CIBlock::GetList(
	$arSortIb,
	$arFilterIb
);

while($ar_res = $arIb->fetch()) {
	$arIblock [$ar_res["ID"]] = "[" . $ar_res["ID"] . "] " . $ar_res["NAME"];
}

//file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/local/test.txt", print_r($arParams, true));


$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => "Выберите тип инфоблока",
			"TYPE" => "LIST",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"VALUES" => $arIblockType
    	),
    	"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "Выберите инфоблок",
			"TYPE" => "LIST",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"VALUES" => $arIblock
    	),
    	"FILTER_ON" => array(
    		"PARENT" => "DATA_SOURCE",
			"NAME" => "Показать форму фильтра",
			"TYPE" => "CHECKBOX"
    	),
    	"FILTER_NAME" => array(
    		"PARENT" => "DATA_SOURCE",
    		"NAME" => "Фильтр",
			"TYPE" => "STRING",
			"DEFAULT" => "arrFilter",
    	),
    	"FIELD_CODE" => CIBlockParameters::GetFieldCode(
			"Поля",
			"DATA_SOURCE",
			array("SECTION_ID"=>true)
		),
  	),
);