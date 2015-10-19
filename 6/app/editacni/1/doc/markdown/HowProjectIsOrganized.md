
[standard Esri web app template gallery]: http://www.arcgis.com/home/gallery.html#c=esri&t=apps&f=configurable
[FAQ]: ../FAQ.md
[JavaScript files organized]: HowJavaScriptFilesAreOrganized.md
[Using the proxy]: https://developers.arcgis.com/javascript/jshelp/ags_proxy.html
[README.md]: ../../README.md

[LICENSE.txt]: ../../LICENSE.txt

![](images/understanding.png)

## How the Project is Organized

* **s2.html** is the app's HTML page. It has a generic name because it *is* generic: the app's user interface definition comes from JSON in a file or in an ArcGIS Online template. s2.html simply "plays" this JSON as a script to build the app's user interface on the fly. For example, `s2.html` launched with `apps2/Finder` creates a Finder app; with `apps2/FindEditFilter`, it creates a Find, Edit, and Filter app. But it is free to any configuration, such as your own `HydrantFinder`, or `ParkSearch`, or `PermitStatus`, or....

    > **s2.html and s1.html, apps2/ and apps1/, js2/ and js1/**
    > We've organized the releases into series, with the initial release being series 1. Within a series, the JSON configuration files will work even as the app software is updated so that we don't inadvertently break your app configurations or require you to migrate your JSON customizations. Note that published apps store the URL to their underlying software so they will continue use the correct series even if we should start a new series. Series 2 is the current series for creating new apps.

* **apps2/** is a folder with web app user interface definition files. Currently, Finder.json and FindEditFilter.json are copied into templates in the [standard Esri web app template gallery][]. You can use and modify any of the configurations in the folder or to create your own.

* **js2/** is a folder with the app's software; see how the [JavaScript files organized][]. Most of the app is in JavaScript to improve caching and thus reduce app loading time.

* **nls/** is a folder with a hierarchy of language-specific phrases. At the top of this hierarchy is a JSON structure with tagged phrases; the hierarchy provides replacements for these tagged phrases by supported language. Not-yet-supported languages use the top of the hierarchy.

* **images/** is a folder with a collection of images for the apps; it mostly contains icons.

* **doc/** is a folder with this set of documentation; the main starting points in the documentation are the "Getting Started with..." articles and the [FAQ][].

* **[README.md][]** is a GitHub-standard description for the repository.

* **proxy.ashx** and **proxy.config** are a proxy program and its configuration file. The proxy program is written in .Net for Internet Information Services (IIS) servers. The ArcGIS API for JavaScript's [Using the proxy][] page has more information.

* **commonConfig.js** is a configuration file used when the project is hosted in ArcGIS Online. We will start using it for this project in a future release.

* **web.config** is an IIS configuration file that tells IIS how to handle and serve files with a `.json` extension. Because the app falls back on the JSON files in the apps2/ folder if it cannot find a user interface definition in a template, it needs to be able to get JSON from its server.

* **CONTRIBUTING.md** and **LICENSE.txt** are welcome mats: we provide this software to you under an open-source license and we welcome your contributions!

* **.gitattributes**, **.gitignore**, **local-government-online-apps.png**, and **CHANGES.txt** are files to support this project in a git repository.

### Notes

* The GitHub standard is to store files using only line feeds -- not the carriage return plus line feed that Windows operating system computers use. If you are using a Windows computer, you will need an editor capable of displaying this type of file. The standard Notepad, e.g., cannot.

----------
Copyright 2013 Esri. Licensed under the Apache License, Version 2.0; a copy of the license is available in the repository's [LICENSE.txt][] file.
