<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

class CIBlockElems extends CBitrixComponent
{

    public function onIncludeComponentLang()
    {
        Loc::loadMessages(__FILE__);
    }
    
    protected function checkModules()
    {
        if (!Loader::includeModule('iblock')){
        	ShowError("Модуль iblock(«Информационные блоки») не подключен");
    	}
    }

    public function onPrepareComponentParams($arParams)
    {
    	if (!isset($arParams["IBLOCK_TYPE"])) {
			ShowError("Тип инфоблока не выбран");
    	}
    	if (!isset($arParams["IBLOCK_ID"])) {
			ShowError("Инфоблок не был выбран");
    	}
    		
        return $arParams;
    }
    public function filterResult()
    {
    	$arFilter = [];
    	$arTmpFilter = $_POST;

    	if (isset($arTmpFilter["btn-filter"])) {
    		foreach ($arTmpFilter as $key => $value) {
    			if ($value != "" && $value != "Фильтр") {
    				$arFilter["?".$key] = $value;
    			}
    		}
    	}
    	return $arFilter;
    }

    public function executeComponent()
    {
    	if (!$this->checkModules()) {
    		if (isset($this->arParams["IBLOCK_ID"])) {
    			$res = CIBlockElement::GetList(
    				array("SORT" => "ASC"),
    				array("IBLOCK_ID" => $this->arParams["IBLOCK_ID"], $this->filterResult())
    			);
    			while($ob = $res->GetNextElement()) {
					$this->arResult["ITEMS"][] = $ob->GetFields();
				}
    		}
    	}
    				
        $this->IncludeComponentTemplate();
    }
}








