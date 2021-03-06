<?= $this->Html->script('controller/busca.resultado.js', ['block' => 'scriptBottom']) ?>
<section id="legislacao">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Busca</h2>
            <p class="lead">Resultado de pesquisa em todo o site.</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php
                echo $this->Form->create("Busca", [
                    "url" => [
                        "controller" => "busca",
                        "action" => "index"
                    ],
                    'idPrefix' => 'pesquisar-licitacao',
                    'type' => 'get',
                    'role' => 'form']);

                ?>

                <?= $this->Form->search('chave', ['id' => 'pesquisa', 'class' => 'form-control busca', 'placeholder' => 'Digite aqui para buscar']) ?>
                 <button type="submit" id="btn-pesquisar" class="btn btn-success"><i class="fa fa-search"></i>&nbsp;Buscar</button>

                <?php echo $this->Form->end(); ?>

                <?php if($total_geral > 0) : ?>
                    <div class="center">
                        <h5><?= "Sua pesquisa retornou $total_geral resultados." ?></h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <?php if($total_noticias > 0): ?>
                <div class="wow fadeInDown" style="display: block">
                    <h2 id="tipo_busca">Noticias</h2>
                    <?php foreach($noticias as $noticia): ?>
                    <div class="col-md-12">
                        <div class="pull-left">
                            <a href="<?= 'noticias/noticia/' . $noticia->post->slug . '-' . $noticia->id ?>">
                                <img id="busca_noticia" class="img-responsive" src="<?= '../' . $noticia->foto ?>" width="250px"/>
                            </a>
                        </div>
                        <div class="media-body" style="padding-left: 10px">
                            <h3 class="media-heading"><?= $noticia->post->titulo ?></h3>
                            <p><?= $noticia->parte ?></p>
                            <a href="<?= 'noticias/noticia/' . $noticia->post->slug . '-' . $noticia->id ?>" class="btn btn-success">Veja mais</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if($total_licitacoes > 0): ?>
                <div class="col-md-12 wow fadeInDown" style="display: inline-block">
                    <h2 id="tipo_busca">Licitações</h2>
                    <?php foreach($licitacoes as $licitacao): ?>
                        <?php if($licitacao->antigo): ?>
                        <div class="col-md-12 col-lg-6">
                            <h3 class="media-heading"><?= $licitacao->titulo ?></h3>
                            <p>Início: <?= $this->Format->date($licitacao->dataInicio, true) ?></p>
                            <p>Término: <?= $this->Format->date($licitacao->dataTermino, true) ?></p>
                            <?= $this->Html->link('Veja mais', ['controller' => 'licitacoes', 'action' =>  'licitacao', $licitacao->slug . '-' . $licitacao->id], ['class' => 'btn btn-success']) ?>
                        </div>
                        <?php else: ?>
                            <div class="item col-md-12 col-lg-6">
                                <h3 class="media-heading" style="text-transform: uppercase;">Processo: <?= $this->Format->zeroPad($licitacao->numprocesso, 3) ?>/<?= $licitacao->ano ?> - <?= $licitacao->titulo ?></h3>
                                <span style="font-style: italic"><?= $licitacao->modalidade->nome ?></span> | <span style="font-weight: bold"><?= $licitacao->situacao ?></span>
                                <?php if($licitacao->modalidade->chave == 'PP' ||
                                        $licitacao->modalidade->chave == 'TP'):?>
                                    <p>Data da Sessão: <?= $this->Format->date($licitacao->dataSessao, true) ?></p>
                                <?php elseif($licitacao->modalidade->chave == 'DI' ||
                                        $licitacao->modalidade->chave == 'IN'):?>
                                    <p>Data da Publicação: <?= $this->Format->date($licitacao->dataPublicacao, true) ?></p>
                                <?php else: ?>
                                    <p>Período de <?= $this->Format->date($licitacao->dataPublicacao, true) ?> até <?= $this->Format->date($licitacao->dataFim, true) ?></p>
                                <?php endif;?>
                                <?php if($licitacao->retificado): ?>
                                    <span style="font-weight:bold; font-style: italic;">Licitação retificada</span>
                                <?php endif;?>
                                <?= $this->Html->link('Detalhes', ['controller' => 'licitacoes', 'action' =>  'licitacao', $licitacao->slug . '-' . $licitacao->id], ['class' => 'btn btn-success']) ?>
                            </div>
                        <?php endif;?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if($total_concursos > 0): ?>
                <div class="col-md-12 wow fadeInDown" style="display: inline-block">
                    <h2 id="tipo_busca">Concursos e Processos Seletivos</h2>
                    <?php foreach($concursos as $concurso): ?>
                        <div class="col-md-12 col-lg-6">
                            <h3 class="media-heading" style="text-transform: uppercase;"><?= $concurso->numero ?> - <?= $concurso->titulo ?></h3>
                            <p style="font-weight: bold"><?= $concurso->situacao ?></p>
                            <p>Inscrições: <?= $this->Format->date($concurso->inscricaoInicio) ?> à <?= $this->Format->date($concurso->inscricaoFim) ?></p>
                            <p>Data da Prova: <?= $this->Format->date($concurso->dataProva) ?></p>
                            <?= $this->Html->link('Detalhes', ['controller' => 'concursos', 'action' =>  'concurso', $concurso->slug . '-' . $concurso->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if($total_informativos_concursos > 0): ?>
                <div class="col-md-12 wow fadeInDown" style="display: inline-block">
                    <h2 id="tipo_busca">Novidades Sobre Concursos e Processos Seletivos</h2>
                    <?php foreach($informativos as $informativo): ?>
                        <div class="col-md-12 col-lg-6">
                            <h3 class="media-heading" style="text-transform: uppercase;"><?= $informativo->titulo ?></h3>
                            <p style="font-weight: bold"><?= $this->Format->Date($informativo->data, true) ?></p>
                            <p><?=$informativo->resumo?></p>
                            <?= $this->Html->link('Detalhes', ['controller' => 'concursos', 'action' =>  'concurso', $concurso->slug . '-' . $concurso->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if($total_legislacao > 0): ?>
                <div class="col-md-12 wow fadeInDown" style="display: inline-block">
                    <h2 id="tipo_busca">Legislação</h2>
                    <?php foreach($legislacao as $item): ?>
                        <div class="col-md-12 col-lg-6">
                            <h3 class="media-heading"><?= $item->titulo ?></h3>
                            <p><?= $item->resumo ?></p>
                            <?= $this->Html->link('Veja mais', ['controller' => 'legislacao', 'action' =>  'documento', $item->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if($total_publicacoes > 0): ?>
                <div class="col-md-12 wow fadeInDown" style="display: inline-block">
                    <h2 id="tipo_busca">Publicações</h2>
                    <?php foreach($publicacoes as $item): ?>
                        <div class="col-md-12 col-lg-6">
                            <h3 class="media-heading"><?= $item->titulo ?></h3>
                            <p><?= $item->resumo ?></p>
                            <?= $this->Html->link('Veja mais', ['controller' => 'legislacao', 'action' =>  'documento', $item->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section><!--/#error-->
