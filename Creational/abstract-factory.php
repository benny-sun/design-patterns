<?php

/**
 * 抽象工廠
 * 工廠的工廠，將相同主題類別的工廠封裝
 */

interface Letter
{
    public function setFontFamily($fontFamily);
    public function getFontFamily();
}

class ModernLetter implements Letter
{

    private $fontFamily = 'modern font family';

    public function setFontFamily($fontFamily)
    {
        $this->fontFamily = $fontFamily;
        return $this;
    }

    public function getFontFamily()
    {
        return $this->fontFamily;
    }
}

class FancyLetter implements Letter
{

    private $fontFamily = 'fancy font family';

    public function setFontFamily($fontFamily)
    {
        $this->fontFamily = $fontFamily;
        return $this;
    }

    public function getFontFamily()
    {
        return $this->fontFamily;
    }
}

/************* */

interface Resume
{
    public function setTitle($title);
    public function getTitle();
}

class ModernResume implements Resume
{

    private $title = 'modern title';

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class FancyResume implements Resume
{

    private $title = 'fancy title';

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

/************* */

interface DocumentCreator
{
    public function createLetter();
    public function createResume();
}

class ModernDocumentCreator implements DocumentCreator
{
    public function createLetter()
    {
        return new ModernLetter();
    }

    public function createResume()
    {
        return new ModernResume();
    }
}

class FancyDocumentCreator implements DocumentCreator
{
    public function createLetter()
    {
        return new FancyLetter();
    }

    public function createResume()
    {
        return new FancyResume();
    }
}

$modernDoc = new ModernDocumentCreator();
$letter = $modernDoc->createLetter();
$resume = $modernDoc->createResume();
var_dump($letter->getFontFamily(), $resume->getTitle());

$modernDoc = new FancyDocumentCreator();
$letter = $modernDoc->createLetter();
$resume = $modernDoc->createResume();
var_dump($letter->getFontFamily(), $resume->getTitle());