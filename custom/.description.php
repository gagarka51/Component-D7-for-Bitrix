<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
    "NAME" => "Список элементов",
    "DESCRIPTION" => "Выводит список элементов инфоблока",
    "CACHE_PATH" => "Y",
    "COMPLEX" => "N",
    "PATH" => array(                                      
        "ID" => "sharkova_components",                                
        "NAME" => "Шаркова С.И.",                           
        "CHILD" => array(
            "ID" => "custom.list",
            "NAME" => "Список компонентов инфоблока"
        )
    )
);
