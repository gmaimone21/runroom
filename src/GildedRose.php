<?php

namespace Runroom\GildedRose;

class GildedRose
{

    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if (
                $item->name === 'Aged Brie' ||
                $item->name === 'Backstage passes to a TAFKAL80ETC concert' ||
                $item->name === 'Sulfuras, Hand of Ragnaros'
            ) {
                if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sellIn < 0) {
                        $item->quality = 0;
                    } else {
                        if ($item->sellIn < 11) {
                            $item->quality = $item->quality++;
                        }
                        if ($item->sellIn < 6) {
                            $item->quality = $item->quality++;
                        }
                    }
                } else {
                    $item->quality = $item->quality++;
                }
            } else {
                $item->quality = $item->quality--;
                if ($item->sellIn >= 0) {
                    $item->sellIn = $item->sellIn--;
                }
            }
        }
    }
}
