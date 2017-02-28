# OpenCart 2.* Dymo LabelWriter

This extension/module/plugin lets you print a label from the order overview in the backend of OpenCart 2.*. For the extension of OpenCart 1.5.6 please see this project: [OpenCart Dymo LabelWriter 1.5.6].

![opencart-order-overview-label](https://cloud.githubusercontent.com/assets/9481318/23029785/f264386e-f46b-11e6-9ad7-edcb2234ae42.PNG)

Note the following:
* This extension is **not** tested thoroughly
* This extension is only tested in OpenCart **2.3**
* This extension is only tested with a **Dymo LabelWriter 450**
* This extension is only tested on **Windows 10 with Internet Explorer 11 (- succeeded) and Google Chrome (- failed)**

### Dependencies

This extension depends on the following frameworks/SDK's/modules

* An installed and connected Dymo LabelWriter or a configured (fake) Dymo LabelWriter driver
* [VQMod] 2.4
* [jQuery] 2.1.1 (already used in the backend of OpenCart 2.3)
* [Dymo Label Framework SDK]

### Installation

* Copy all the files of /admin directory and /vqmod directory in the target directories
* Grant permission for the extension to the appropriate user group

### Known Issues

At this moment the extension only works in Internet Explorer. A while ago, with a different version of Google Chrome, this code worked. Some comments and problems are described here: http://developers.dymo.com/2010/06/02/dymo-label-framework-javascript-library-samples-print-a-label/ . But again, this extension is not tested, for example, on Mac or/and Safari. Quote from the comments:
> There are plans to add Firefox/Chrome support on Mac in the upcoming DLS 8.3 release. But there is no guarantee…

Another quote: 
> I assume you are referring to Chrome on Mac OS X. Now, Chrome version 22 and above have dropped support for Carbon event model of NPAPI plugins. This model event is default for 32-bit plugins and that’s why it can’t load the DYMO plugin. We have to write a new plugin which is anticipated for DLS 8.5.0.

### Todo's

 - Write Tests
 - Minify JavaScript files
 - Make the loading of printers more dynamic
 - Maybe make the extension compatible with other eCommerce platforms?

### Version
1.0.0 Beta

### Contribute

Want to contribute? Be my guest and fork this project! Let me know all your requests and suggestions!

### License

MIT

[Dymo Label Framework SDK]: http://labelwriter.com/software/dls/sdk/js/DYMO.Label.Framework.latest.js
[jQuery]:http://jquery.com
[VQMod]: https://github.com/vqmod/vqmod
[OpenCart Dymo LabelWriter 1.5.6]: https://github.com/Paulsky/opencart-dymo-labelwriter