# MJML Converter

Very simple wrapper around [mjml](https://www.npmjs.com/package/mjml) package - just to be 
able to convert via it on PHP. 

Installation:
1. Add **yarn install** hook to root composer.json. This will install mjml into the package folder after package is installed.
```json
{
  "scripts": {
    "post-install-cmd": [
        "\\Schedulr\\SimpleMjml\\YarnInstall::run"
      ]
  },
}
```
2. Install package with `composer require kilianmaier/mjml-converter:dev-master`
