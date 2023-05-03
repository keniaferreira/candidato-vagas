<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Session;
use Hash;

class VagaFormRequest extends FormRequest
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
    'titulo'    => 'required|max:255',
    'descricao' => 'required|max:2000',
    'tipo'      => 'in:pj,freelancer,clt',
    'situacao'  => 'in:ativa,inativa',
  ];
  
  public function validar(Request $request)
  {
    $retorno = true;

    $messages = [
      'tipo.in' => 'O tipo informado é inválido. Tipos possíveis: pj, freelancer ou clt.',
      'situacao.in' => 'A situação informada é inválida. Situações possíveis: ativa ou inativa.',
    ];

    $input = $request->all();

    $validator = \Validator::make($input, $this->rules, $messages);

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
