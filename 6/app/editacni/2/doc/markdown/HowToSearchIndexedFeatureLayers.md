[js.LGSearchFeatureLayer]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGSearchFeatureLayer.html
[js.LGSearchMultiplexer]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGSearchMultiplexer.html
[js.LGSearchFeatureLayerMultiplexer]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGSearchFeatureLayerMultiplexer.html
[js.LGSearchBoxByText]: http://localgovtemplates2.esri.com/support/local-government-online-apps/doc/js2_doc/js.LGSearchBoxByText.html

[UseIndexed.json]: ../examples2/UseIndexed.json

[app configuration file]: UnderstandingConfigurationFile.md
[create a custom template]: HowToCreateCustomTemplate.md
[apps2/ folder]: ../../apps2/
[Solutions online apps GitHub site]: https://github.com/Esri/local-government-online-apps
[doc/examples2/ folder]: ../examples2/
[nls/ folder]: ../../nls/
[Resources]: Resources.md
[Esri Support]: http://support.esri.com/
[LICENSE.txt]: ../../LICENSE.txt

![](images/configuring.png)

## How to Search Indexed Feature Layers

> Configuration hides/exposes/moves existing functionality only and these changes are supported by [Esri Support][].
> Apps with configuration changes may be hosted in ArcGIS Online or on your server.

### Summary

We will modify an [app configuration file][] in the repository and use its contents to [create a custom template][]. Any of the app configuration files in the repository's [apps2/ folder] can be used as a starting point.

The standard Finder performs a wildcard search with leading and trailing wildcard characters. Thus, a search matches any feature that has the text that your user types somewhere in at least one of the search fields.

This freedom to match anywhere in the searched field is helpful, but it comes at the price of not permitting the search to use any index that the feature layer has -- it's not possible to do an indexed search if the first character(s) are not known. For a small feature layer, this can be an acceptable tradeoff. For a larger feature layer -- one with thousands of features, e.g. -- it may make searching far too slow.

One of the configuration parameters for the feature-layer search components is "searchPattern"; it is into this pattern that the user's typed-in text is inserted for a search. In the standard Finder, the search pattern is `"%${1}%"`. For this article, our change removes the initial wildcard character and instead use the search pattern `"${1}%"`. The resulting search pattern will work with an index in the feature layer.

It is not necessary to give up fully free-text searching for smaller feature layers, however. Because the search string is configured for each searcher, we can use [js.LGSearchMultiplexer][] to coordinate a search of your large feature layer and of your small feature layer. Your user still sees the same single type-in box for entering his/her search; we only need to change what actions are occurring out of sight of the user.

----------
### Procedure

What we'll do is change LGSearchBoxByText to use a [js.LGSearchMultiplexer][]. That searcher will coordinate a [js.LGSearchFeatureLayer][] searcher for the large feature layer and a [js.LGSearchFeatureLayerMultiplexer][] searcher for one or more small feature layers. By using [js.LGSearchFeatureLayerMultiplexer][] for the small layers, it still be possible to specify the feature layers by name during publication configuration just as we can do with the standard Finder. We'll configure the [js.LGSearchFeatureLayer][] outside of the publication configuration so that we don't have to change that user interface yet.

(Note that the publication configuration user interface *can* be changed if you want to do so. We could remove all feature-layer configuration from the publication configuration user interface, or have two [js.LGSearchFeatureLayerMultiplexer][] configurations with one for large layers and one for small layers, or...; there are many possibilities.)

* Make a copy of apps2/ParcelViewer.json; we'll call it UseIndexed.json for this exercise, but the name doesn't matter.

* Open UseIndexed.json in a text editor and search for the name of the JavaScript class that holds the standard Finder searcher:

    ```json
    "classname": "js.LGSearchFeatureLayerMultiplexer"
    ```

* After this component, we'll add components for [js.LGSearchFeatureLayer][] and [js.LGSearchMultiplexer][]; the result will look like this:

    ```json
    }, {
        "classname": "js.LGSearchFeatureLayerMultiplexer",
        "config": {
            "rootId": "featureSearcher",
            "parentDiv": "contentFrame",
            "dependencyId": "map",
            "busyIndicator": "busyIndicator",
            "publishPointsOnly": false,
            "searchPattern": "%${1}%",
            "caseInsensitiveSearch": true
        }
    }, {
        "classname": "js.LGSearchFeatureLayer",
        "config": {
            "rootId": "largeFeatureSearcher",
            "parentDiv": "contentFrame",
            "dependencyId": "map",
            "busyIndicator": "busyIndicator",
            "publishPointsOnly": false,
            "searchLayerName": "Parcel Details",
            "searchFields": "SITEADDRESS,CNVYNAME,PARCELID",
            "searchPattern": "${1}%",
            "caseInsensitiveSearch": true
        }
    }, {
        "classname": "js.LGSearchMultiplexer",
        "config": {
            "rootId": "multiSearcher",
            "parentDiv": "contentFrame",
            "searcherNames": [
                "featureSearcher",
                "largeFeatureSearcher"
            ]
        }
    }, {
    ```

    > Note a few details about [js.LGSearchFeatureLayer][]:
    > *  It includes configuration parameters "searchLayerName" and "searchFields". These are the same configurations that [js.LGSearchFeatureLayerMultiplexer][] has in its publication configuration; we're just defining them here in the script for [js.LGSearchFeatureLayer][] instead of in the publication configuration experience.
    > *  It has a slightly different "searchPattern" configuration than [js.LGSearchFeatureLayerMultiplexer][]: no leading wildcard.

* Copy the "rootId" configuration parameter of the [js.LGSearchMultiplexer][] component that we just added; in this example, it's "multiSearcher".

* Search for [js.LGSearchBoxByText][], the box that uses a searcher:

    ```json
    "classname": "js.LGSearchBoxByText"
    ```

* Change the "searcher" configuration parameter of the [js.LGSearchBoxByText][] component to have it use the [js.LGSearchMultiplexer][] component:

    ```json
    "searcher": "multiSearcher",
    ```





* Save and lint UseIndexed.json; copy its contents into a new custom template's Configuration Parameters. Publish a map, and you'll see the help display appear as soon as the web app starts.

----------
### Related information

All app source code is available from the [Solutions online apps GitHub site][]; this article's template configuration is [UseIndexed.json][] in the repository's [doc/examples2/ folder][].

Because it can be very easy to make a small typing error, we strongly recommend "linting" your changed files to validate their syntax. All JavaScript & JSON in the repository is validated except for third-party libraries. Additional information is available on the [Resources][] page.

Copyright 2013 Esri. Licensed under the Apache License, Version 2.0; a copy of the license is available in the repository's [LICENSE.txt][] file.