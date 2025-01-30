<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Transacoes extends BaseController
{
    public function index()
    {
        $data = [
            'titulo'    => 'Transacões',
        ];
        $s = $this->request->getGet('s');
        
        $model = model('TransacoesModel');

        if($s !== null){
            $model
                            ->like('nome', $s);
            
            $data['transacoes'] = $model->paginate(25);
            $data['pager'] = $model->pager;
                
            Session()->set(['msg'=> null]);
            return view('transacoes/transacoes', $data);                    
            }
        
        $data['transacoes'] = $model->paginate(25);
        $data['pager'] = $model->pager;

        Session()->set(['msg'=> null]);
        return view('transacoes/transacoes', $data);

    }

    public function salvar(){

        $id = $this->request->getPost('id') ?? null;
        $data = $this->request->getPost();
        $data['clientes'] = $this->prepararClientes();
        $model = model('TransacoesModel');
        
        if(is_numeric($id)){
            
            try{
                $model->update($id, $data);
                
                return redirect()->to(base_url('transacoes/editar/' . $id))
                                ->with('success', 'Transacao salva com sucesso');
            }

            catch(Exception $e){

                return redirect()   ->back()
                ->withInput()
                ->with('error', 'Erro ao salvar Transacao: ' . $e->getMessage());
            }
        }else{
            try{

                $model->insert($data);
                $id = $model->getInsertID();
                return redirect()->to(base_url('transacoes/editar/' . $id))
                                ->with('success', 'Transacao salva com sucesso');
            }

            catch(Exception $e){

                return redirect()   ->back()
                ->withInput()
                ->with('error', 'Erro ao salvar Transacao: ' . $e->getMessage());
            }
        }
    }

    public function editar($id){
        $data = [
            'titulo'    => 'Editar Dados da Transação',
        ];
        $data['transacao'] = model('TransacoesModel')->find($id);
        if ($data['transacao']) {
            // Decodifica o JSON de clientes para um array
            $data['transacao']['cliente'] = json_decode($data['transacao']['clientes'], true) ?? [];
        }

        Session()->set(['msg'=> null]);

        return view('transacoes/consultarTransacao', $data);
    }

    public function novo(){
        $data = [
            'titulo'    => 'Nova Transação',
        ];
        $cliente = $this->request->getGet('cliente');
        $imovel = $this->request->getGet('imovel');
        $data['cliente'] = $cliente;
        $data['imovel'] = $imovel;
        Session()->set(['msg'=> null]);
        return view('transacoes/consultarTransacao', $data);
    }

    public function excluir($id){
        $model = model('TransacoesModel');
        $model->delete($id);
        return redirect()->to(base_url('transacoes'))
                        ->with('success', 'Transacao excluída com sucesso');
    }

    private function prepararClientes(){
        $clientes = $this->request->getPost('cliente[]');
        // Converte o array de clientes para JSON
        if (isset($clientes) && is_array($clientes)) {
            $dados = json_encode($clientes);
        }else {
            $dados = null; 
        }
        return $dados;
    }
}