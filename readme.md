Lumen Form Request
==========
![php-badge](https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg)
[![packagist-badge](https://img.shields.io/packagist/v/albertcht/lumen-form-request.svg)](https://packagist.org/packages/albertcht/lumen-form-request)
[![Total Downloads](https://poser.pugx.org/albertcht/lumen-form-request/downloads)](https://packagist.org/packages/albertcht/lumen-form-request)

## Description

A package that helps developer to segregate the validation logic from controller to a separate dedicated class. Lumen doesn't have any `FormRequest` class like Laravel. This will let you do that.


### Installation

```
composer require joeldeval/lumen-form-request
```

* Add the service provider in `bootstrap/app.php`

```
$app->register(Joeldeval\Form\FormRequestServiceProvider::class);
```

Next step is create your FormRequest and extends from `Joeldeval\Form\FormRequest`

### Example

```php
<?php

namespace App\Http\Requests;

use Joeldeval\Form\FormRequest;

class StoreDeviceRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'mac_address' => 'required|unique:devices,mac_address'
		];
	}
}
```
