[apps2/ folder]: ../../apps2/
[JSON format]: http://en.wikipedia.org/wiki/JSON
[JSON syntax]: http://www.json.org/
[modifying the publication configuration user interface]: http://resources.arcgis.com/en/help/arcgisonline/index.html#/Add_configurable_parameters_to_templates/010q000000ns000000/
[publication configuration app user interface components]: UnderstandingPubConfigUserInterfaceComponents.md
[web app user interface components]: UnderstandingAppUserInterfaceComponents.md
[LICENSE.txt]: ../../LICENSE.txt

![](images/understanding.png)

## Understanding the Configuration File

Each of the templates in the Solutions set of web apps is defined using the contents of an app configuration file. This file contains a pair of user interface configuration scripts that are "played" by a corresponding pair of JavaScript apps. One script is for the publication configuration app, which permits you to do fine-tuning configuration of the app as part of the publication process; the other script is for the web app itself. Since these configurations are stored with the template, ArcGIS Online can host the app for you even when you've altered either or both of these user interfaces. Or you can download the source for free and host it on your server.

In this article, we look at the structure of a configuration file, and, in particular, the part of that structure that affects the web app's user interface. These files are stored in the [apps2/ folder] of the repository; each is also stored in its corresponding ArcGIS Online template used to create online apps based on web maps.

Because the configuration files use the [JSON format][], you can read and change them. When you look at one of the configuration files, you'll see that it's a nested structure of tags and values, where values can be quoted text, a number, a structure (a structure is enclosed in braces ("{" to "}")), or a list (or array, enclosed in square brackets ("[" to "]")). For more information about the syntax, see [JSON syntax][].

The top level of the JSON in the configuration file contains four items:

* **license** is license text for our open source software
* **values** contains initial (default) values for the publication configuration user interface
* **configurationSettings** contains the publication configuration's user interface
* **ui** contains the web app's user interface

> ArcGIS Online Help has information about [modifying the publication configuration user interface].

### Publication configuration app's user interface components

The "configurationSettings" section is a list of [publication configuration app user interface components]. The order that the components appear in this list is the order in which the components are displayed in the publication configuration app.

The "values" section is a structure that lists initial values to be used when the publication configuration app is first started. Any changes that the publishing user makes during this configuration are stored in the web app and take precedence over the corresponding items in the values section.

When your user changes values during publication configuration, the changes are stored within the web app ArcGIS Online item also in a "values" section.

### Web app's user interface components

The "ui" section is a list of [web app user interface components]. The order that the components appear in this list is the order in which the components are created. If a component references another component, the referenced component must exist earlier in the list; the app does not support deferred reference resolution at this time. References are by component name.

The app uses the values in the "values" section of the configuration unless they are overridden by changes recorded in the web app ArcGIS Online item.

----------
Copyright 2013 Esri. Licensed under the Apache License, Version 2.0; a copy of the license is available in the repository's [LICENSE.txt][] file.