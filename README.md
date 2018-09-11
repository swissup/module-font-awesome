# Font Awesome 4

[Font Awesome 4](https://fontawesome.com/v4.7.0/) for Magento2.

Looking for FontAwesome5? We have a separate repository for it:
https://github.com/swissup/font-awesome-5

### Contents

 1. [Installation](#installation)
 2. [Usage](#usage)
 3. [Advanced Usage](#advanced-usage)
 4. [How to replace standard Magento icons](#how-to-replace-standard-magento-icons)

### Installation

```bash
cd <magento_root>
composer require swissup/font-awesome
bin/magento module:enable Swissup_Core Swissup_FontAwesome
bin/magento setup:upgrade
```

### Usage

 1. Search for icon you need at [official FontAwesome site](https://fontawesome.com/v4.7.0/icons/)
 2. Copy and Paste selected code into HTML content.

    Example:

    ```html
    <i class="fa fa-camera-retro"></i>
    ```

 3. That's all!

### Advanced Usage

Looking for advanced usage examples? Here you go:

 - [Sizing Icons](https://fontawesome.com/v4.7.0/examples/#larger)
 - [Fixed Width Icons](https://fontawesome.com/v4.7.0/examples/#fixed-width)
 - [Icons as a List](https://fontawesome.com/v4.7.0/examples/#list)
 - [Bordered + Pulled Icons](https://fontawesome.com/v4.7.0/examples/#bordered-pulled)
 - [Animating Icons](https://fontawesome.com/v4.7.0/examples/#animated)
 - [Rotating Icons](https://fontawesome.com/v4.7.0/examples/#rotated-flipped)
 - [Stacking Icons](https://fontawesome.com/v4.7.0/examples/#stacked)

### How to replace standard Magento icons

Add the following variables into your theme less file:

```less
@icons__font-name: 'FontAwesome';

@icon-font__size: 14px;
@icon-font__line-height: inherit;

@icon-wishlist-full: '\f004';
@icon-wishlist-empty: '\f08a';
@icon-success: '\f058';
@icon-error: '\f071';
@icon-warning: '\f071';
@icon-update: '\f021';
@icon-star: '\f005';
@icon-star-empty: '\f006';
@icon-settings: '\f013';
@icon-menu: '\f0c9';
@icon-location: '\f041';
@icon-info: '\f129';
@icon-list: '\f00b';
@icon-grid: '\f009';
@icon-comment-reflected: '\f075';
@icon-collapse: '\f147';
@icon-checkmark: '\f00c';
@icon-bag: '\f290';
@icon-cart: '\f291';
@icon-calendar: '\f073';
@icon-arrow-up: '\f176';
@icon-arrow-down: '\f175';
@icon-search: '\f002';
@icon-next: '\f105';
@icon-prev: '\f104';
@icon-pointer-down: '\f0d7';
@icon-pointer-up: '\f0d8';
@icon-pointer-right: '\f0da';
@icon-pointer-left: '\f0d9';
@icon-flag: '\f024';
@icon-expand: '\f196';
@icon-envelope: '\f0e0';
@icon-compare-full: '\f0ec';
@icon-compare-empty: '\f0ec';
@icon-comment: '\f075';
@icon-up: '\f106';
@icon-down: '\f107';
@icon-help: '\f059';
@icon-arrow-up-thin: '\f176';
@icon-arrow-right-thin: '\f178';
@icon-arrow-down-thin: '\f175';
@icon-arrow-left-thin: '\f177';
@icon-account: '\f007';
@icon-gift-registry: '\f274';
@icon-present: '\f06b';
@icon-trash: '\f1f8';
@icon-edit: '\f040';
@icon-remove: '\f00d';
@icon-print: '\f02f';
@icon-download: '\f0ab';
@icon-private: '\f023';
```
