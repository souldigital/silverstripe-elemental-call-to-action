# SilverStripe Elemental Call To Action
A simple Call-to-Action block with HTML-Text and button  
(private project, no help/support provided)

## Requirements

* SilverStripe ^4.4
* dnadesign/silverstripe-elemental ^4.0@dev
* sheadawson/silverstripe-linkable ^2.0@dev

## Suggestions
* soulandwolf/elemental-styling

Modify `/templates/Soulandwolf/Elements/CallToAction/Includes/Title.ss` to your needs when using StyledTitle from soulandwolf/elemental-styling.

## Installation

- Install the module via Composer
  ```
  composer require soulandwolf/elemental-call-to-action
  ``` 

## Configuration

A basic/default config. Add this to your **mysite/\_config/elements.yml**

Note the example options for `colors`, for which NO styles are included in the default style sheet.

```

---
Name: elementcalltoaction
---
Soulandwolf\Elements\CallToAction\Element\ElementCallToAction:
  ## disable StyledTitle
  title_tag_variants: null
  title_alignment_variants: null
  ## default/example config
  styles:
    DefaultWell: 'with well'
    FullWidthWell: 'with well and full width (Container-Breakout)'
  styles_default_description: ''
  colors:
    primary: 'primary'
    success: 'success'
    info: 'info'
    warning: 'warning'
    danger: 'danger'
    myOwnCta: 'some other css-selector'
  readmore_link_class: 'btn btn-default btn-readmore'
```

Additionally you may apply the default styles:

```
# add default styles
DNADesign\Elemental\Controllers\ElementController:
  default_styles:
    - soulandwolf/elemental-call-to-action:client/dist/styles/frontend-default.css
```

See Elemental Docs for [how to disable the default styles](https://github.com/dnadesign/silverstripe-elemental#disabling-the-default-stylesheets).

### Adding your own templates

You may add your own templates/styles like this:

```
Soulandwolf\Elements\CallToAction\Element\ElementCallToAction
  styles:
    MyCustomTemplate: "new customized special Layout"
```

...and put a template named `ElementCallToAction_MyCustomTemplate.ss`in `themes/{your_theme}/templates/Soulandwolf/Elements/CallToAction/Element/`  
**and/or**
add styles for `.soulandwolf__elements__calltoaction__element__elementcalltoaction.mycustomtemplate` to your style sheet.  

Note: The left/right version is supplied via css (no separate template).


## Template Notes

Templates based on Bootstrap 3+, but need some extra styling

- Optionaly, you can require basic CSS stylings provided with this module to your controller class like **mysite/code/PageController.php**  
  
  ```
  Requirements::css('soulandwolf/elemental-call-to-action:client/dist/styles/frontend-default.css');
  ```
- or copy over and modify `client/src/styles/frontend-default.scss` in your theme scss 

## Screen Shots

(not available)


