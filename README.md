# Font Awesome

[Font Awesome][fontawesome_homepage] for Magento2

### Installation

```bash
cd <magento_root>
composer config repositories.swissup composer http://swissup.github.io/packages/
composer require swissup/font-awesome --prefer-source
bin/magento module:enable Swissup_FontAwesome
bin/magento setup:upgrade
```

### Usage

To add icons to the custom content, use the following code:

```html
<i class="fa fa-camera-retro"></i>
```

1. See the list of available examples at fontawesome's [official site][fontawesome_examples]
2. Search for icon you need at [official site][fontawesome_icons]

[fontawesome_homepage]: http://fortawesome.github.io/Font-Awesome/
[fontawesome_examples]: http://fortawesome.github.io/Font-Awesome/examples/
[fontawesome_icons]: http://fortawesome.github.io/Font-Awesome/icons/
