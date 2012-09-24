This is a simple [Filepicker.io](https://www.filepicker.io/) app
for the [Elefant CMS](http://www.elefantcms.com/).

Usage:

1\. Install the app into your apps folder:

git clone git@github.com:jbroadway/filepicker.git apps/filepicker

2\. Add your API key to `apps/filepicker/conf/config.php`.

3\. Create an upload field in your handlers or views:

```
{! filepicker/my_field_name?mimetypes=image/* !}
```

To enable drag & drop, use:

```
{! filepicker/my_field_name?dragdrop=1 !}
```

Or from any handler, use:

```php
echo $this->run ('filepicker/my_field_name', array (
	'mimetypes' => 'image/*',
	'option-services'  => 'COMPUTER,DROPBOX,GOOGLE_DRIVE,URL',
	'dragdrop'  => true,
	'onchange'  => 'console.log(event)'
));
```

> Note that you can skip the `data-fp-` prefix on option names.

See here for all available options:

https://developers.filepicker.io/docs/web/#widgets-open
