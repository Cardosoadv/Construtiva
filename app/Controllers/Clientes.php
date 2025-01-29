<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Clientes extends BaseController
{
    public function index()
    {
        $data = [
            'titulo'    => 'Clientes',
        ];
        $s = $this->request->getGet('s');
        
        $clientesModel = model('ClienteModel');

        if($s !== null){
            $clientesModel
                            ->like('nome', $s);
            
            $data['clientes'] = $clientesModel->paginate(25);
            $data['pager'] = $clientesModel->pager;
                
            Session()->set(['msg'=> null]);
            return view('clientes/clientes', $data);                    
            }
        
        $data['clientes'] = $clientesModel->paginate(25);
        $data['pager'] = $clientesModel->pager;

        Session()->set(['msg'=> null]);
        return view('clientes/clientes', $data);

    }

    public function salvar(){
        $id = $this->request->getPost('id') ?? null;
        $data = $this->request->getPost();

        $model = model('ClienteModel');
        
        if(is_numeric($id)){
            
            try{
                $model->update($id, $data);
                
                return redirect()->to(base_url('clientes/editar/' . $id))
                                ->with('success', 'Processo salvo com sucesso');
            }

            catch(Exception $e){

                return redirect()   ->back()
                ->withInput()
                ->with('error', 'Erro ao salvar processo: ' . $e->getMessage());
            }
        }else{
            try{

                $model->insert($data);
                $id = $model->getInsertID();
                return redirect()->to(base_url('clientes/editar/' . $id))
                                ->with('success', 'Processo salvo com sucesso');
            }

            catch(Exception $e){

                return redirect()   ->back()
                ->withInput()
                ->with('error', 'Erro ao salvar processo: ' . $e->getMessage());
            }
        }
    }

    public function editar($id){
        $data = [
            'img'       => 'vazio.png',
            'titulo'    => 'Editar Dados do Cliente',
        ];
        $data['cliente'] = model('ClienteModel')->find($id);

        Session()->set(['msg'=> null]);

        return view('clientes/consultarClientes', $data);
    }

    public function novo(){
        $data = [
            'img'       => 'vazio.png',
            'titulo'    => 'Novo Cliente',
        ];
        Session()->set(['msg'=> null]);
        return view('clientes/consultarClientes', $data);
    }

    public function excluir($id){
        $model = model('ClienteModel');
        $model->delete($id);
        return redirect()->to(base_url('clientes'))
                        ->with('success', 'Cliente excluído com sucesso');
    }
}