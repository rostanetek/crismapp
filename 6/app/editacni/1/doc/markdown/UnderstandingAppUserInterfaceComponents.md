[app configuration file]: UnderstandingConfigurationFile.md
[JSON format]: http://en.wikipedia.org/wiki/JSON
[CSS]: http://www.w3schools.com/cssref/
[colors by name]: http://www.w3schools.com/cssref/css_colornames.asp
[colors by hex value]: http://www.w3schools.com/cssref/css_colorsfull.asp
[js.LGMap]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGMap.html
[js.LGHighlighter]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGHighlighter.html
[js.LGCommand]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGCommand.html
[nls/ folder]: ../../nls/
[nls/template.js]: ../../nls/template.js
[LICENSE.txt]: ../../LICENSE.txt

![](images/understanding.png)

## Understanding the Configuration of the Web App's User Interface Components

Each of the templates in the Solutions set of web apps is defined using the contents of an [app configuration file][]. One part of this file -- the list named "ui" -- defines the components used to create the web app's user interface.

A component's description consists of two or three parts in the [JSON format][]:

* **config** is a structure of configuration elements for the component.
* **classname** is the name of the JavaScript class in the Solutions library implementing the component. The web app instantiates (creates) an object of this class using the contents of the config part.
* **styles** (optional) is a string of [CSS][] that is referenced by the config part. If the component does not use visual elements, then this part may be omitted. It is not necessary to include CSS that has been defined by an earlier component in the script because components share their styles section.

For example, a component of class "[js.LGMap][]" might look like this:

```json
    {
        "classname": "js.LGMap",
        "styles": ".mapContainer{margin:0px;padding:0px;overflow:hidden;position:absolute}.simpleInfoWindow .close{width:32px!important;height:32px!important;background-size:32px 32px;left:244px!important;top:-18px!important}.simpleInfoWindow .title{min-height:14px}",
        "config": {
            "rootId": "map",
            "rootClass": "mapContainer",
            "parentDiv": "contentFrame",
            "fill": true
        }
    }
```

Here is what the various configuration elements mean:

* **rootId** is the name of the element; this is used by other elements to refer to this element
* **rootClass** is the name of the CSS class used to draw the element; you'll see the configured class "mapContainer" in the list of styles for the element
* **parentDiv** is the name of the element that will contain this element in the app
* **fill** indicates that this element will fill its parent container

Another example component is "[js.LGHighlighter][]", which is used for highlighting selected graphics on the map. It works with, and thus depends on, a [js.LGMap][], so you'll see a reference to a map element in its configuration:

```json
    {
        "classname": "js.LGHighlighter",
        "config": {
            "rootId": "highlighter",
            "parentDiv": "contentFrame",
            "dependencyId": "map",
            "lineHiliteColor": "#0000ff",
            "fillHiliteColor": [0, 0, 255, 0.1]
        }
    }
```

Here is what the various configuration elements mean:

* **rootId** is the name of the element; this is used by other elements to refer to this element
* **parentDiv** is the name of the element that will contain this element in the app; for this element, it is more of an administrative containment since the js.Highlighter controls the way that a js.Map draws -- it doesn't have a graphical appearance of its own
* **dependencyId** indicates that this element depends on an element named "map"
* **lineHiliteColor** specifies the color to be used for highlighting lines
* **fillHiliteColor** specifies the color used for filling highlighted polygons

Colors may be defined using
* a **hex string** of the form "#rrggbb" or "#rgb", where "r" stands for a hexadecimal digit for red, "g" for green, and "b" for blue. (If only a single digit is specified, it is duplicated automatically, so "#f80" becomes "#ff8800".) Color intensities range from "00" (0 decimal, or none) to "ff" (255 decimal, or full), so in the example above, the lineHiliteColor is set to full blue with no red or green. See [colors by hex value][] for examples.
* a **color name**, e.g., "blue", "darkorange", etc. (case insensitive); see [colors by name][] for a list of usable names
* an **array of three values** -- red, green, and blue -- each ranging from 0 to 255
* an **array of four values** -- red, green, blue, each ranging from 0 to 255 -- and alpha (opacity), ranging from 0.0 (invisible / completely transparent) to 1.0 (completely opaque).

Note how a component is enclosed by braces ("{}"). Because the ui section is a list, each component is separated from the next by a comma, as you can see between these two components:

```json
    {
        "classname": "js.LGCommand",
        "config": {
            "rootId": "basemap",
            "tooltip": "@tooltips.basemap",
            "iconUrl": "images/basemap.png",
            "parentDiv": "commandPanel",
            "rootClass": "commandButton",
            "iconClass": "commandIcon",
            "dependencyId": "basemapBox",
            "publish": "basemap"
        }
    }, {
        "classname": "js.LGCommand",
        "config": {
            "rootId": "share",
            "tooltip": "@tooltips.share",
            "iconUrl": "images/share.png",
            "parentDiv": "commandPanel",
            "rootClass": "commandButton",
            "iconClass": "commandIcon",
            "dependencyId": "shareBox",
            "publish": "share"
        }
    }
```

This example also illustrates how the app is able to handle internationalization in the configuration file. The configuration of a [js.LGCommand][] component, which is the class used to show the command buttons in the app, includes the specification of a tooltip. You can put your own tooltip in the configuration of the component, or you can use one of the internationalized phrases that are included with the app. The phrases are in the [nls/ folder] hierarchy: [nls/template.js] contains the JSON structure defining the available phrases, and subdirectories contain the language-specific version of each phrase. In a component, you indicate that you want to use the internationalized phrases by starting a string of text with "@" and supplying the path to the phrase. For example, the component named "basemap" above uses `@tooltips.basemap` as its text. This indicates that

1. the app looks in the internationalized phrases for the text instead of using the text directly
2. the phrase is found in variable "basemap" in the "tooltips" structure

```json
define({
    root: ({
        tooltips: {
            search: "Find",  // Command button to open a dialog box for finding a feature or an address (depending on app)
            locate: "Current location",  // Command button to zoom and pan to the current geographical position reported by the browser
            markup: "Submit correction",  // Command button to submit a correction to the app's host
            collect: "Filter/Edit",  // Command button to open a filter and template picker to add features to the map and to edit them afterwards
            filter: "Filter map layers",  // Explains purpose of type-in box affiliated with template picker
            basemap: "Switch basemap",  // Command button to open a dialog box for switching basemaps
            share: "Share",  // Command button to open a dropdown menu for picking a type of sharing
            shareViaEmail: "Share via email",  // Command button to share the current map extents via email

```

The component named "share" above also uses the internationalized phrases; it uses variable "share" in the same "tooltips" structure.

----------
Copyright 2013 Esri. Licensed under the Apache License, Version 2.0; a copy of the license is available in the repository's [LICENSE.txt][] file.