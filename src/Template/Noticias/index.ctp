<section id="blog" class="container">
    <div class="center">
        <h2>Notícias</h2>
        <p class="lead">Notícias recentes do município.</p>
    </div>

    <div class="blog">
        <div class="row">
        
            <div class="col-md-8">
                 <?php if(count($noticias) > 0): ?>
                     <?php foreach($noticias as $noticia): ?>
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?= $this->Format->date($noticia->post->dataPostagem) ?></span>
                                        <span><i class="fa fa-user"></i> <a href="#"><?= $noticia->post->autor->pessoa->nome ?></a></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <a href="<?= 'noticias/noticia/' . $noticia->post->slug . '-' . $noticia->id ?>"><img class="img-responsive img-blog" src="<?= '../' . $noticia->foto ?>" width="100%" alt="<?= $noticia->post->titulo ?>" /></a>
                                    <h2><a href="<?= 'noticias/noticia/' . $noticia->post->slug . '-' . $noticia->id ?>"><?= $noticia->post->titulo ?></a></h2>
                                    <h3><?= $noticia->parte ?></h3>
                                    <a class="btn btn-primary readmore" href="<?= 'noticias/noticia/' . $noticia->post->slug . '-' . $noticia->id ?>">Leia mais</a>
                                </div>
                            </div>
                        </div>
                     <?php endforeach; ?>

                     <?=$this->element('pagination') ?>
                <?php else: ?>
                    <p>Nenhuma notícia publicada até o momento! Volte mais tarde</p>
                 <?php endif; ?>
            </div>
            <!--/.col-md-8-->


            <aside class="col-md-4">
                <div class="widget search">
                    <h3>Busca</h3>
                     <?php
                        echo $this->Form->create("Noticia", [
                            "url" => [
                                "controller" => "noticias",
                                "action" => "index"
                            ],
                            'idPrefix' => 'pesquisar-noticias',
                            'type' => 'get',
                            'role' => 'form']);
                            
                    ?>

                    <?= $this->Form->search('chave', ['class' => 'form-control search_box', 'placeholder' => 'Digite aqui para buscar e pressione ENTER', 'onkeypress' => 'this.submit()']) ?>

                    <?php echo $this->Form->end(); ?>
                    
                </div>
                <!--/.search-->

                <div class="widget categories">
                    <h3>Facebook</h3>
                    <div class="row">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprefeituradecoqueiral&tabs=timeline%2Cevents&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340"
                            height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </div>
                </div>
                <!--/.recent comments-->

                <div class="widget categories">
                    <h3>Previsão do Tempo</h3>
                    <div class="row">
                        <!-- Widget Previs&atilde;o de Tempo CPTEC/INPE --><iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://www.cptec.inpe.br/widget/widget.php?p=1597&w=v&c=607065&f=ffffff" height="350px" width="192px"></iframe><noscript>Previs&atilde;o de <a href="http://www.cptec.inpe.br/cidades/tempo/1597">Coqueiral/MG</a> oferecido por <a href="http://www.cptec.inpe.br">CPTEC/INPE</a></noscript><!-- Widget Previs&atilde;o de Tempo CPTEC/INPE -->
                    </div>
                </div>
                
            </aside>
        </div>
        <!--/.row-->
    </div>
</section>