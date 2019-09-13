<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    const ITEM_AGED_BRIE = 'Aged Brie';
    const ITEM_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const ITEM_BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    const ITEM_CONJURED = 'Conjured Mana Cake';

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->quality < 50 && $this->quality >= 0) {

            // Regla por item en especifico
            self::items();
        }

        $this->sellIn += -1;

        // Quality no puede ser negativo ni mayor que 0
        $this->quality = ($this->quality < 0) ? 0 : $this->quality;
        $this->quality = ($this->quality > 50) ? 50 : $this->quality;
    }

    private function items()
    {
        switch ($this->name) {

            case self::ITEM_AGED_BRIE:
                self::rulesItemAgedBrie();
                break;
            
            case self::ITEM_SULFURAS:
                self::rulesItemSulfurus();
                break;

            case self::ITEM_BACKSTAGE:
                self::rulesItemBackstage();
                break;

            case self::ITEM_CONJURED:
                self::rulesItemCunjure();
                break;

            // Items que comparten reglas en especifico
            default:
                self::rulesItemDefault();
                break;
        }
    }

    private function rulesItemDefault() {
        $this->quality += ($this->sellIn <= 0) ? -2 : -1;
    }

    private function rulesItemAgedBrie() {
        $this->quality += ($this->sellIn <= 0) ? +2 : +1;
    }

    private function rulesItemSulfurus() {
        $this->sellIn += +1;
    }

    private function rulesItemBackstage() {
        if ($this->sellIn > 10) {
            $this->quality += +1;
        } else if ($this->sellIn > 5) {
            $this->quality += +2;
        } else if ($this->sellIn > 0) {
            $this->quality += +3;
        } else {
            $this->quality += -$this->quality;
        }
    }

    private function rulesItemCunjure() {
        $this->quality += ($this->sellIn <= 0) ? -4 : -2;
    }

    // codigo original que a sido refactorizado
    public function tickOriginal()
    {
        if ($this->name != 'Aged Brie' and $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($this->quality > 0) {
                if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                    $this->quality = $this->quality - 1;
                }
            }
        } else {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;

                if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->sellIn < 11) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                    if ($this->sellIn < 6) {
                        if ($this->quality < 50) {
                            $this->quality = $this->quality + 1;
                        }
                    }
                }
            }
        }

        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->sellIn = $this->sellIn - 1;
        }

        if ($this->sellIn < 0) {
            if ($this->name != 'Aged Brie') {
                if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->quality > 0) {
                        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                            $this->quality = $this->quality - 1;
                        }
                    }
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }
    }
}
