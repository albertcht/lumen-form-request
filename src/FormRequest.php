<?php

namespace AlbertCht\Form;

use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

abstract class FormRequest extends Request
{
    public function validate()
    {
        if (false === $this->authorize()) {
            throw new UnauthorizedException();
        }

        $validator = app('validator')->make($this->all(), $this->rules(), $this->messages());

        if ($validator->fails()) {
            throw new ValidationException($validator, $validator->errors());
        }
    }

    public function resolveUser()
    {
        if (method_exists($this, 'setUserResolver')) {
            $this->setUserResolver(function () {
                return Auth::user();
            });
        }
    }

    protected function authorize()
    {
        return true;
    }

    abstract protected function rules ();

    protected function messages ()
    {
        return [];
    }
}
