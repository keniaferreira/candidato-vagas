<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Session;
use Hash;

class CandidatoFormRequest extends FormRequest
{  
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  private $errors = [];
  private $rules = [ 
    'nome'               => 'required|max:20',
    'sobrenome'          => 'required|max:29',
    'cpf_cnpj'           => 'required|max:18',
    'data_nascimento'    => 'required|max:18',
    'email'              => 'required|max:18',
    'ddd'                => 'required|max:3',
    'cep'                => 'required|max:10',
    'rua'                => 'required|max:80',
    'numero'             => 'required|max:20',
    'complemento'        => 'required|max:40',
    'bairro'             => 'required|max:60',
    'cidade'             => 'required|max:60',
    'uf'                 => 'required|max:2',
    'formacao_academica' => 'required|max:2000',
    'experiencia'        => 'required|max:2000',
    'idiomas'            => 'required|max:255',
    'competencias'       => 'required|max:1000',
    'certificados'       => 'required|max:2000',
    'links'              => 'required|max:800',
  ];
  
  public function validar(Request $request)
  {
    $retorno = true;

    $input = $request->all();

    $validator = \Validator::make($input, $this->rules);

    if ($validator->fails()) 
    { 
      $this->errors = $validator->errors()->messages();
      $retorno = false;
    }

    if(!$this->validar_detalhes($request)){
      $retorno = false;
    }

    return $retorno;
  }

  private function validar_detalhes(Request $request){

    $input = $request->all();
    $resultado = true;

    if(empty($input)){
      $this->errors[] = array('Formulário inválido.');
      return false;
    }
    return $resultado;
  }

  public function messages()
  {    	
    return $this->errors;        
  }

}
