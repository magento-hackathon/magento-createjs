Magento module for integration create.js into default CMS funktionality
=======================================================================


from [Create.js](http://createjs.org): "**Create.js** is a comprehensive web editing interface for Content Management Systems. It is designed to provide a modern, fully browser-based HTML5 environment for managing content."

this module tries to integrate Create.js in the last intrusive way possible.


## What are Problems you face when integrate it into Magento?

* for security reasons save actions should happen over Admin Controller and account
* link to the admin url should only appear, if you are already logged in as Admin or have a secret activation key (because communication between admin and frontend part is difficult)
* for a clean addition of the RDFa attributes, you would need to rewrite the CMS Block, as certain parts are not accessable via templates.


## Things are currently missing

* Admin controller action to receive and update CMS Content


## Other Notes

The work on this module was started during the [Create.js Hackathon](http://lanyrd.com/2012/createjs-hackathon-berlin/) in Berlin 2012.

