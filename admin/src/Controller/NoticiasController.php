<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;
use \Exception;
use \DateTime;


class NoticiasController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $t_noticias = TableRegistry::get('Noticia');
        $limite_paginacao = Configure::read('Pagination.limit');
        
        $condicoes = array();
        $data = array();

        if (count($this->request->getQueryParams()) > 3) 
        {
            $titulo = $this->request->query('titulo');
            $data_inicial = $this->request->query('data_inicial');
            $data_final = $this->request->query('data_final');
            $mostrar = $this->request->query('mostrar');

            if($titulo != "")
            {
                $condicoes['Post.titulo LIKE'] = '%' . $titulo . '%';
            }

            if ($data_inicial != "" && $data_final != "") 
            {
                $condicoes["Post.dataPostagem >="] = $this->Format->formatDateDB($data_inicial);
                $condicoes["Post.dataPostagem <="] = $this->Format->formatDateDB($data_final);
            }

            if ($mostrar != 'T') 
            {
                $condicoes["Post.ativo"] = ($mostrar == "A") ? "1" : "0";
            }

            $data['titulo'] = $titulo;
            $data['data_inicial'] = $data_inicial;
            $data['data_final'] = $data_final;
            $data['mostrar'] = $mostrar;

            $this->request->data = $data;   
        }

        $joins = ['Post' => ['Usuario' => ['Pessoa']]];

        $this->paginate = [
            'limit' => $limite_paginacao,
            'conditions' => $condicoes,
            'contain' => $joins,
            'order' => [
                'id' => 'DESC'
            ]
        ];

        $opcao_paginacao = [
            'name' => 'notícias',
            'name_singular' => 'notícia',
            'predicate' => 'encontradas',
            'singular' => 'encontrada'
        ];

        $noticias = $this->paginate($t_noticias);

        $qtd_total = $t_noticias->find('all', [
            'contain' => $joins,
            'conditions' => $condicoes
        ])->count();

        $combo_mostra = ["T" => "Todos", "A" => "Somente ativos", "I" => "Somente inativos"];
        
        $this->set('title', 'Notícias');
        $this->set('icon', 'style');
        $this->set('combo_mostra', $combo_mostra);
        $this->set('noticias', $noticias);
        $this->set('qtd_total', $qtd_total);
        $this->set('limit_pagination', $limite_paginacao);
        $this->set('opcao_paginacao', $opcao_paginacao);
        $this->set('data', $data);
    }

    public function imprimir()
    {
        $t_noticias = TableRegistry::get('Noticia');

        $condicoes = array();

        if (count($this->request->getQueryParams()) > 0) 
        {
            $titulo = $this->request->query('titulo');
            $data_inicial = $this->request->query('data_inicial');
            $data_final = $this->request->query('data_final');
            $mostrar = $this->request->query('mostrar');

            if($titulo != "")
            {
                $condicoes['Post.titulo LIKE'] = '%' . $titulo . '%';
            }

            if ($data_inicial != "" && $data_final != "") 
            {
                $condicoes["Post.dataPostagem >="] = $this->Format->formatDateDB($data_inicial);
                $condicoes["Post.dataPostagem <="] = $this->Format->formatDateDB($data_final);
            }

            if ($mostrar != 'T') 
            {
                $condicoes["Post.ativo"] = ($mostrar == "A") ? "1" : "0";
            }
        }

        $noticias = $t_noticias->find('all', [
            'contain' => ['Post' => ['Usuario' => ['Pessoa']]],
            'conditions' => $condicoes,
            'order' => [
                'Noticia.id' => 'DESC'
            ]
        ]);

        $qtd_total = $noticias->count();

        $auditoria = [
            'ocorrencia' => 9,
            'descricao' => 'O usuário solicitou a impressão da lista de notícias.',
            'usuario' => $this->request->session()->read('UsuarioID')
        ];

        $this->Auditoria->registrar($auditoria);

        if ($this->request->session()->read('UsuarioSuspeito')) 
        {
            $this->Monitoria->monitorar($auditoria);
        }

        $this->viewBuilder()->layout('print');

        $this->set('title', 'Licitações');
        $this->set('noticias', $noticias);
        $this->set('qtd_total', $qtd_total);
    }

    public function add()
    {
        $this->Flash->info('Dica: Caso deixe campos data e/ou hora em branco, o sistema irá preencher automaticamente, com a data e hora corrente.');
        $this->redirect(['action' => 'cadastro', 0]);
    }

    public function edit(int $id)
    {
        $this->redirect(['action' => 'cadastro', $id]);
    }

    public function cadastro(int $id)
    {
        $title = ($id > 0) ? 'Edição da Notícia' : 'Nova Notícia';
        $icon = 'style';

        $t_noticias = TableRegistry::get('Noticia');

        if($id > 0)
        {
            $noticia = $t_noticias->get($id, ['contain' => ['Post']]);

            $noticia->titulo = $noticia->post->titulo;
            $noticia->data = $noticia->post->dataPostagem->i18nFormat('dd/MM/yyyy');
            $noticia->hora = $noticia->post->dataPostagem->i18nFormat('HH:mm');
            $noticia->destaque = $noticia->post->destaque;
            $noticia->ativo = $noticia->post->ativo;

            $this->set('noticia', $noticia);
        }
        else
        {
            $this->set('noticia', null);
        }

        $this->set('title', $title);
        $this->set('icon', $icon);
        $this->set('id', $id);
    }

    public function save(int $id)
    {
        if ($this->request->is('post')) 
        {
            $this->insert();
        } 
        elseif ($this->request->is('put')) 
        {
            $this->update($id);
        }
    }

    public function delete(int $id)
    {
        try
        {
            $t_noticias = TableRegistry::get('Noticia');

            $marcado = $t_noticias->get($id);
            $titulo = $marcado->titulo;

            $propriedades = $marcado->getOriginalValues();

            $this->removerArquivo($marcado->imagem);

            $t_noticias->delete($marcado);
            
            $this->Flash->greatSuccess('A notícia ' . $titulo . ' foi excluída com sucesso!');

            $auditoria = [
                'ocorrencia' => 29,
                'descricao' => 'O usuário excluiu uma noticia.',
                'dado_adicional' => json_encode(['dado_excluido' => $id, 'dados_registro_excluido' => $propriedades]),
                'usuario' => $this->request->session()->read('UsuarioID')
            ];

            $this->Auditoria->registrar($auditoria);

            if($this->request->session()->read('UsuarioSuspeito'))
            {
                $this->Monitoria->monitorar($auditoria);
            }

            $this->redirect(['action' => 'index']);
        }
        catch(Exception $ex)
        {
            $this->Flash->exception('Ocorreu um erro no sistema ao excluir a notícia.', [
                'params' => [
                    'details' => $ex->getMessage()
                ]
            ]);

            $this->redirect(['action' => 'index']);
        }  
    }

    protected function insert()
    {
        try
        {
            $t_noticias = TableRegistry::get('Noticia');
            $t_posts = TableRegistry::get('Post');

            $entity = $t_noticias->newEntity($this->request->data());
            $post = $t_posts->newEntity($this->request->data());

            $post->dataPostagem = $this->obterDataPostagem($entity->data, $entity->hora);
            $post->autor = $this->request->session()->read('UsuarioID');

            $arquivo = $this->request->getData('arquivo');
            $entity->foto = $this->salvarArquivo($arquivo);

            $t_posts->save($post);

            $entity->post = $post->id;

            $t_noticias->save($entity);
            $this->Flash->greatSuccess('Notícia salva com sucesso.');
            
            $propriedades = $entity->getOriginalValues();
            
            $auditoria = [
                'ocorrencia' => 27,
                'descricao' => 'O usuário publicou a nova notícia.',
                'dado_adicional' => json_encode(['id_nova_noticia' => $entity->id, 'dados_noticia' => $propriedades]),
                'usuario' => $this->request->session()->read('UsuarioID')
            ];

            $this->Auditoria->registrar($auditoria);

            if($this->request->session()->read('UsuarioSuspeito'))
            {
                $this->Monitoria->monitorar($auditoria);
            }

            $this->redirect(['action' => 'cadastro', $entity->id]);
        }
        catch(Exception $ex)
        {
            $this->Flash->exception('Ocorreu um erro no sistema ao salvar a notícia', [
                'params' => [
                    'details' => $ex->getMessage()
                ]
            ]);

            $this->redirect(['action' => 'cadastro', 0]);
        }
    }

    protected function update(int $id)
    {
        try
        {
            $t_noticias = TableRegistry::get('Noticia');
            $t_posts = TableRegistry::get('Post');

            $entity = $t_noticias->get($id);
            $post = $t_posts->get($entity->post);

            $antigo_arquivo = $entity->foto;

            $t_noticias->patchEntity($entity, $this->request->data());
            $t_posts->patchEntity($post, $this->request->data());

            $enviaArquivo = ($this->request->getData('enviaArquivo') == 'true');

            if($enviaArquivo)
            {
                $this->removerArquivo($antigo_arquivo);
                $arquivo = $this->request->getData('arquivo');
                $entity->foto = $this->salvarArquivo($arquivo);
            }

            $post->dataPostagem = $this->obterDataPostagem($entity->data, $entity->hora);
            $post->dataAlteracao = date("Y-m-d H:i:s");

            $propriedades = $this->Auditoria->changedOriginalFields($entity);
            $modificadas = $this->Auditoria->changedFields($entity, $propriedades);

            $t_posts->save($post);
            
            $entity->post = $post->id;

            $t_noticias->save($entity);
            $this->Flash->greatSuccess('Notícia salva com sucesso.');

            $auditoria = [
                'ocorrencia' => 28,
                'descricao' => 'O usuário editou uma notícia.',
                'dado_adicional' => json_encode(['noticia_modificada' => $id, 'valores_originais' => $propriedades, 'valores_modificados' => $modificadas]),
                'usuario' => $this->request->session()->read('UsuarioID')
            ];

            $this->Auditoria->registrar($auditoria);

            if($this->request->session()->read('UsuarioSuspeito'))
            {
                $this->Monitoria->monitorar($auditoria);
            }

            $this->redirect(['action' => 'cadastro', $entity->id]);
        }
        catch(Exception $ex)
        {
            $this->Flash->exception('Ocorreu um erro no sistema ao salvar a licitação', [
                'params' => [
                    'details' => $ex->getMessage()
                ]
            ]);

            $this->redirect(['action' => 'cadastro', $id]);
        }
    }

    private function removerArquivo($arquivo)
    {
        $diretorio = Configure::read('Files.paths.public');
        $arquivo = $diretorio . $arquivo;

        $file = new File($arquivo);

        if($file->exists())
        {
            $file->delete();
        }
    }

    private function salvarArquivo($arquivo)
    {
        $diretorio = Configure::read('Files.paths.noticias');
        $url_relativa = Configure::read('Files.urls.noticias');

        $file_temp = $arquivo['tmp_name'];
        $nome_arquivo = $arquivo['name'];

        $file = new File($file_temp);
        $pivot = new File($nome_arquivo);

        $novo_nome = uniqid() . '.' . $pivot->ext();

        if(!$this->File->validationExtension($pivot, $this->File::TYPE_FILE_IMAGE))
        {
            throw new Exception("A extensão do arquivo é inválida.");
        }
        elseif(!$this->File->validationSize($file))
        {
            $maximo = $this->File->getMaxLengh($this->File::TYPE_FILE_IMAGE);
            $divisor = Configure::read('Files.misc.megabyte');

            $maximo = round($maximo / $divisor, 0);

            $mensagem = "O tamaho da imagem enviada é muito grande. O tamanho máximo do arquivo de imagens é de $maximo MB.";
            
            throw new Exception($mensagem);
        }   
        
        $file->copy($diretorio . $novo_nome, true);

        return $url_relativa . $novo_nome;
    }

    private function obterDataPostagem($data, $hora)
    {
        $postagem = null;

        if($data == "" && $hora == "")
        {
            $postagem = date("Y-m-d H:i:s");
        }
        elseif($data == "" && $hora != "")
        {
            $postagem = date("Y-m-d") . ' ' . $hora . ':00';
        }
        elseif(($data != "" && $hora == ""))
        {
            $pivot = $this->Format->formatDateDB($data);
            $postagem = $pivot . ' ' . date('H:i:s');
        }
        else
        {
            $postagem = $this->Format->mergeDateDB($data, $hora);
        }

        return $postagem;
    }

}