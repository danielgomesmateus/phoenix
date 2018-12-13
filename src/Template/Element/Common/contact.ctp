<div class="content">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <h1 class="title-content text-center">
            <i class="fa fa-rocket" aria-hidden="true"></i> Entre em contato
            </h1>
            <div class="col-md-5 col-xs-12 col-sm-12">
                <form>
                    <div class="form-group">
                        <label>
                            Nome:
                        </label>
                        <input type="text" id="name" name="name" class="form-control field-form" placeholder="Informe o seu nome completo" required="required">
                        <div id="error-name" class="hidden error-validation">Nome inválido!</div>
                    </div>
                    <div class="form-group">
                        <label>
                            Assunto:
                        </label>
                        <input type="text" id="subject" name="subject" class="form-control field-form" placeholder="Informe o assunto" required="required">
                        <div id="error-subject" class="hidden error-validation">Assunto inválido!</div>
                    </div>
                    <div class="form-group">
                        <label>
                            Email:
                        </label>
                        <input type="email" id="email" name="email" class="form-control field-form" placeholder="Informe o email de contato" required="required">
                        <div id="error-email" class="hidden error-validation">Email em formato inválido!</div>
                    </div>
                    <div class="form-group">
                        <label>
                            Mensagem:
                        </label>
                        <textarea id="message" name="message" class="form-control field-form" rows="5" required="required"></textarea>
                        <div id="error-message" class="hidden error-validation">Mensagem muito curta!</div>
                    </div>
                    <a href="#" type="submit" class="btn btn-success" id="btnSubmitContact">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar
                    </a>
                </form>
            </div>
            <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-12">
                <div class="content-text">
                    Utilize o formulário ao lado para iniciarmos um bate-papo. Vamos nos conhecer e nós lhe indicaremos o melhor serviço para atender à sua demanda.
                </div>
                <?php echo $this->Html->image('how-mobile.png', ['class' => 'img-responsive']); ?>
            </div>
        </div>
    </div>
</div>