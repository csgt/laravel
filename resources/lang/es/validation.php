<?php
 //Falta terminar de traducir
return [

  'accepted'             => ':attribute debe ser aceptado.',
  'active_url'           => ':attribute no es una dirección válida.',
  'after'                => ':attribute debe ser una fecha posterior a :date.',
  'alpha'                => ':attribute solo debe contener letras.',
  'alpha_dash'           => ':attribute solo debe contener letras, números y guiones.',
  'alpha_num'            => ':attribute solo debe contener letars y números.',
  'array'                => ':attribute debe ser un arreglo.',
  'before'               => ':attribute debe ser una fecha anterior a :date.',
  'between'              => [
      'numeric' => ':attribute debe estar entre :min y :max.',
      'file'    => 'The :attribute must be between :min and :max kilobytes.',
      'string'  => 'The :attribute must be between :min and :max characters.',
      'array'   => 'The :attribute must have between :min and :max items.',
  ],
  'boolean'              => 'The :attribute field must be true or false.',
  'confirmed'            => 'Confirmación de :attribute no coincide.',
  'date'                 => 'The :attribute is not a valid date.',
  'date_format'          => 'The :attribute does not match the format :format.',
  'different'            => 'The :attribute and :other must be different.',
  'digits'               => 'The :attribute must be :digits digits.',
  'digits_between'       => 'The :attribute must be between :min and :max digits.',
  'dimensions'           => 'The :attribute has invalid image dimensions.',
  'distinct'             => 'The :attribute field has a duplicate value.',
  'email'                => 'The :attribute must be a valid email address.',
  'exists'               => 'The selected :attribute is invalid.',
  'file'                 => 'The :attribute must be a file.',
  'filled'               => 'The :attribute field is required.',
  'image'                => 'The :attribute must be an image.',
  'in'                   => 'The selected :attribute is invalid.',
  'in_array'             => 'The :attribute field does not exist in :other.',
  'integer'              => 'The :attribute must be an integer.',
  'ip'                   => 'The :attribute must be a valid IP address.',
  'json'                 => 'The :attribute must be a valid JSON string.',
  'max'                  => [
      'numeric' => 'The :attribute may not be greater than :max.',
      'file'    => 'The :attribute may not be greater than :max kilobytes.',
      'string'  => 'The :attribute may not be greater than :max characters.',
      'array'   => 'The :attribute may not have more than :max items.',
  ],
  'mimes'                => 'The :attribute must be a file of type: :values.',
  'min'                  => [
      'numeric' => 'The :attribute must be at least :min.',
      'file'    => 'The :attribute must be at least :min kilobytes.',
      'string'  => 'The :attribute must be at least :min characters.',
      'array'   => 'The :attribute must have at least :min items.',
  ],
  'not_in'               => 'The selected :attribute is invalid.',
  'numeric'              => 'The :attribute must be a number.',
  'present'              => 'The :attribute field must be present.',
  'regex'                => 'The :attribute format is invalid.',
  'required'             => ':attribute es requerido.',
  'required_if'          => 'The :attribute field is required when :other is :value.',
  'required_unless'      => 'The :attribute field is required unless :other is in :values.',
  'required_with'        => 'The :attribute field is required when :values is present.',
  'required_with_all'    => 'The :attribute field is required when :values is present.',
  'required_without'     => 'The :attribute field is required when :values is not present.',
  'required_without_all' => 'The :attribute field is required when none of :values are present.',
  'same'                 => 'The :attribute and :other must match.',
  'size'                 => [
      'numeric' => 'The :attribute must be :size.',
      'file'    => 'The :attribute must be :size kilobytes.',
      'string'  => 'The :attribute must be :size characters.',
      'array'   => 'The :attribute must contain :size items.',
  ],
  'string'               => 'The :attribute must be a string.',
  'timezone'             => 'The :attribute must be a valid zone.',
  'unique'               => ':attribute ya fue tomado.',
  'url'                  => 'The :attribute format is invalid.',

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Here you may specify custom validation messages for attributes using the
  | convention "attribute.rule" to name the lines. This makes it quick to
  | specify a specific custom language line for a given attribute rule.
  |
  */

  'custom' => [
      'attribute-name' => [
          'rule-name' => 'custom-message',
      ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Custom Validation Attributes
  |--------------------------------------------------------------------------
  |
  | The following language lines are used to swap attribute place-holders
  | with something more reader friendly such as E-Mail Address instead
  | of "email". This simply helps us make messages a little cleaner.
  |
  */

  'attributes' => [],

];
