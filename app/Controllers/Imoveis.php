<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Imoveis extends BaseController
{
    public function index()
    {
        $data = [
            'titulo'    => 'Imóveis',
        ];
        $s = $this->request->getGet('s');
        
        $imovelModel = model('ImovelModel');

        if($s !== null){
            $imovelModel
                            ->like('nome', $s);
            
            $data['imoveis'] = $imovelModel->paginate(25);
            $data['pager'] = $imovelModel->pager;
                
            Session()->set(['msg'=> null]);
            return view('imoveis/imoveis', $data);                    
            }
        
        $data['imoveis'] = $imovelModel->paginate(25);
        $data['pager'] = $imovelModel->pager;

        Session()->set(['msg'=> null]);
        return view('imoveis/imoveis', $data);

    }

    public function salvar(){
        $id = $this->request->getPost('id') ?? null;
        $data = $this->request->getPost();
        $cliente = $this->request->getPost('clienteGet');

        $model = model('ImovelModel');
        
        if(is_numeric($id)){
            
            try{
                $model->update($id, $data);
                
                return redirect()->to(base_url('transacoes/novo' . $id))
                                ->with('success', 'Imóvel salvo com sucesso');
            }

            catch(Exception $e){

                return redirect()   ->back()
                ->withInput()
                ->with('error', 'Erro ao salvar imóvel: ' . $e->getMessage());
            }
        }else{
            try{

                $model->insert($data);
                $id = $model->getInsertID();
                return redirect()->to('transacoes/novo?cliente=' . $cliente.'&imovel='. $id)
                                ->with('success', 'Imóvel salvo com sucesso');
            }

            catch(Exception $e){

                return redirect()   ->back()
                ->withInput()
                ->with('error', 'Erro ao salvar Imóvel: ' . $e->getMessage());
            }
        }
    }

    public function editar($id){
        $data = [
            'titulo'    => 'Editar Dados do Imóvel',
        ];
        $data['imovel'] = model('ImovelModel')->find($id);

        Session()->set(['msg'=> null]);

        return view('imoveis/consultarImoveis', $data);
    }

    public function novo(){
        $data = [
            'titulo'    => 'Novo Imóvel',
        ];
        $cliente = $this->request->getGet('cliente');
        Session()->set(['msg'=> null]);
        return view('imoveis/consultarImoveis', $data);
    }

    public function excluir($id){
        $model = model('ImovelModel');
        $model->delete($id);
        return redirect()->to(base_url('imoveis'))
                        ->with('success', 'Imóvel excluído com sucesso');
    }
}